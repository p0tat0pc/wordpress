<?php
class License_Key
{
    protected $data;
    public function __construct($data){
        $defaults = array(
            "url_demo"      =>  '',
            "url_document"  =>  '#',
            "url_premium"   =>  '#',
            "theme_id"      =>  ''
        );
        $args = wp_parse_args( $data, $defaults );
        $this->data = $args;
        update_option( "is_melissa", 'License_Key');

        add_action( 'wp_ajax_melissa_check_purchase_code', array( $this,'check_purchase_code_ajax') );
        add_action( 'wp_ajax_melissa_check_purchase_code_remove', array( $this,'check_purchase_remove_code_ajax') );
        add_action( 'admin_enqueue_scripts', array( $this,'add_js' ) );
        if(!get_option( 'is_key_melissa' )) {
            add_action( 'admin_notices', array( $this, 'add_notice') );
        }
    }

    public function add_page(){
        add_theme_page(
            esc_html__('Melissa','melissa-portfolio') ,
            esc_html__('Melissa','melissa-portfolio'),
            'manage_options',
            'melissa',
            array( $this,'render' ),
        );
    }

    public function render() {
    ?>
        <h2><?php esc_html_e("License Key",'melissa-portfolio') ?></h2>
        <form method="post">
            <?php
            settings_fields( 'melissa_settings' );
            do_settings_sections( 'melissa_settings' );
            ?>
            <div>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e('License:','melissa-portfolio') ?> </th>
                        <td>
                            <div class="booknow_settings_container_holidays">
                                <div class="booknow_settings_container_holiday">
                                    <input class="regular-text" type="text" value="<?php echo esc_attr(get_option( 'is_key_melissa' )) ?>" />
                                    <?php echo '<a href="#" class="button button-primary melissa-button-active">'.esc_html__('Active','melissa-portfolio').'</a>'; ?>
                                    <p class="description">
                                        <a href="<?php echo esc_attr($this->data['url_demo']) ?>" target="_blank"><?php esc_html_e('Demo','melissa-portfolio') ?></a> |
                                        <a href="<?php echo esc_attr($this->data['url_demo']) ?>" target="_blank"><?php esc_html_e('Get pre version','melissa-portfolio') ?></a> |
                                        <a href="<?php echo esc_attr($this->data['url_demo']) ?>" target="_blank"><?php esc_html_e('Document','melissa-portfolio') ?></a>
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <?php
    }

    public function add_notice() {
        $melissa_page_url = 'http://demo1.crthemes.com/melissa/';
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong><?php esc_html_e(MELISSA_PORTFOLIO_NAME) ?>: </strong><?php esc_html_e( 'You can buy the premium version, to be able to use blocks, one click demo import ... here: ', 'melissa-portfolio' ); ?> <a href="<?php echo esc_url( MELISSA_PORTFOLIO_URL_DEMO ) ?>" target="_blank" ><?php echo esc_url( MELISSA_PORTFOLIO_URL_DEMO ) ?></a></p>
            <p><?php esc_html_e( 'Demo: ', 'melissa-portfolio' ); ?> <a href="<?php echo esc_url( $melissa_page_url ) ?>" target="_blank" ><?php echo esc_url( $melissa_page_url ) ?></a></p>
        </div>
        <?php
    }

    public function check_purchase_code_ajax() {
        $code = sanitize_text_field($_POST['code']);
        $personalToken = $this->data["token"];
        $site = 'https://crthemes.com';
        $url = $site.'/wp-json/wc/v3/purchase';
        $headers = array(
            'Content-Type' => 'multipart/form-data',
            'Api-Key' => $personalToken,
        );
        $data = array('code' => $code, 'theme_id' => $this->data['theme_id']);
        $result = wp_remote_post($url, array('headers' => $headers, 'body' => json_encode($data)));
        $status_code = '';
        if($result['body'] === 'valid') {
            update_option( "is_key_melissa", $code);
            $status_code = 'valid';
        } else {
            update_option( "is_key_melissa", '');
            $status_code = 'false';
        }
        echo $status_code;
        exit();
    }

    public function check_purchase_remove_code_ajax() {}

    function add_js(){
        wp_enqueue_script( 'melissa-portfolio-purchase-code', get_template_directory_uri() . '/assets/js/purchase_code.js', array( 'jquery' ), MELISSA_PORTFOLIO_VERSION, true );
    }
}
$data = array(
    'url_demo'      => MELISSA_PORTFOLIO_URL_DEMO,
    'url_document'  => MELISSA_PORTFOLIO_URL_DOCS,
    'url_premium'   => MELISSA_PORTFOLIO_URL_GET_PREMIUM,
    'theme_id'      => MELISSA_PORTFOLIO_ID_THEMES_PREMIUM,
    'token'         => 'uzAMx8rZ3FRV0ecu8t1pXNWG0d0NA6qL',
);
new License_Key($data);