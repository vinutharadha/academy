<?php
/**
 * Admin main template
 */

defined( 'ABSPATH' ) || die();

$modules = self::get_modules();
$total_modules_count = count( $modules );
?>
<div class="wrap">
    <h1 class="screen-reader-text"><?php esc_html_e( 'Wow Divi Carousel', 'wdcl-wow-divi-carousel-lite' ); ?></h1>
    <form class="wdcl-admin" id="wdcl-admin-form">
        <div class="wdcl-admin-header">
            <div class="wdcl-admin-logo-inline">
                <img class="wdcl-logo-icon-size" src="<?php echo WDCL_PLUGIN_ASSETS; ?>imgs/admin/wdcl-logo-white.svg" alt="">
            </div>
        </div>
        <div class="wdcl-admin-tabs">
            <div class="wdcl-admin-tabs-content">
                <div class="wdcl-admin-panel">
                    <div class="wdcl-home-body">
                        
                        <div class="wdcl-row wdcl-row-fixed-width">
                            <div class="wdcl-col wdcl-col-left">
                                <h3 class="wdcl-feature-title">Knowledge Base</h3>
                                <p class="wdcl-text f18">We understand the need of a helpful knowledge base and have that for you. It will help you to understand how our plugin works.</p>
                                <a class="wdcl-btn wdcl-btn-primary" target="_blank" rel="noopener" href="https://wowcarousel.com/docs/">Take Me to The Knowledge Page</a>
                            </div>
                            <div class="wdcl-col wdcl-col-right">
                                <img class="wdcl-img-fluid" src="<?php echo WDCL_PLUGIN_ASSETS; ?>imgs/admin/art1.png" alt="Knowledge Base">
                            </div>
                        </div>

                        <div class="wdcl-row wdcl-align-center">
                            <div class="wdcl-col">
                                <span class="wdcl-section-title-badge">DIVI</span>
                                <h2 class="wdcl-section-title wdcl-text-primary">Carousel Modules</h2>
                            </div>
                        </div>

                        <div class="wdcl-row wdcl-admin-modules-row wdcl-row wdcl-row-fixed-width">
                            <div class="wdcl-col">
                                <div class="wdcl-admin-modules">
                                    <?php 
                                        foreach ( $modules as $module_key => $module_data ) :
                                            
                                            $title = isset( $module_data['title'] ) ? $module_data['title'] : '';
                                            $demo_url = isset( $module_data['demo'] ) && $module_data['demo'] ? $module_data['demo'] : '';
                                            $class_attr = 'wdcl-admin-modules-item';

                                            if ( empty($module_data['demo']) ) {
                                                $class_attr .= ' wdcl-admin-modules-item-placeholder';
                                                $checked = 'disabled="disabled"';
                                            }
                                    ?>

                                    <div class="<?php echo $class_attr; ?>">

                                        <?php if( $module_data['is_free'] === true ) : ?>
                                            <span class="wdcl-admin-modules-item-badge-free">FREE</span>
                                        <?php else : ?>
                                            <span class="wdcl-admin-modules-item-badge-pro">PRO</span>
                                        <?php endif; ?>

                                        <h3 class="wdcl-admin-modules-item-title">
                                            <label for="wdcl-module-<?php echo $module_key; ?>"><?php echo $title; ?></label>
                                            <?php if ( $demo_url ) : ?>
                                                <a href="<?php echo esc_url( $demo_url ); ?>" 
                                                    target="_blank" 
                                                    rel="noopener" 
                                                    data-tooltip="<?php esc_attr_e( 'Click and view demo', 'wdcl-wow-divi-carousel-lite' ); ?>" 
                                                    class="wdcl-admin-modules-item-preview">
                                                    <img class="wdcl-img-fluid wdcl-item-icon-size" src="<?php echo WDCL_PLUGIN_ASSETS; ?>imgs/admin/desktop.svg" alt="demo-link">
                                                </a>
                                            <?php endif; ?>
                                        </h3>
                                    </div>

                                    <?php
                                        endforeach;
                                    ?>

                                </div>
                            </div>
                        </div>

                        <div class="wdcl-row wdcl-row-fixed-width wdcl-section-support">
                            <div class="wdcl-col wdcl-col-left">
                                <div class="wdcl-border-box .wdcl-min-height-450">
                                    <h3 class="wdcl-feature-title">Join Divi People Community!</h3>
                                    <p class="wdcl-text f18">Join the community of super helpful Divi users. Say hello, ask questions, give feedback and help each other!</p>
                                    <a class="wdcl-btn wdcl-btn-primary" target="_blank" rel="noopener" href="https://www.facebook.com/groups/divipeople/">Join Group</a>
                                </div>
                            </div>

                            <div class="wdcl-col wdcl-col-right">
                                <div class="wdcl-border-box .wdcl-min-height-450">
                                    <h3 class="wdcl-feature-title">Support And Feedback</h3>
                                    <p class="wdcl-text f18">Still need help? Submit a ticket and one of our support experts will get back to you as soon as possible.</p>
                                    <a class="wdcl-btn wdcl-btn-primary wdcl-btn-highlight" target="_blank" rel="noopener" href="https://wowcarousel.com/support/">Get Support</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="wdcl-footer wdcl-row-copyright">
            <h4>WowCarousel from <a href="http://divipeople.com/" target="_blank">Divipeople</a></h4>
        </div>
    </form>
</div>