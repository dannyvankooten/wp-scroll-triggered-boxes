<?php defined('ABSPATH') or exit; ?>
<div class="wrap" id="boxzilla-admin" class="boxzilla-extensions">

    <h2>Available Add-On Plugins</h2>
    <p>There are various add-ons available for Boxzilla which further enhance the functionality of the core plugin.</p>
    <p>To gain instant access the premium add-on plugins listed here, <a href="https://boxzillaplugin.com/pricing#utm_source=wp-plugin&utm_medium=boxzilla&utm_campaign=extensions-page">have a look at our pricing</a>.</p>

    <?php if (empty($extensions)) : ?>
        <script>
            window.setTimeout( function() {
                window.location.href = 'https://boxzillaplugin.com/add-ons/#utm_source=wp-plugin&utm_medium=boxzilla&utm_campaign=extensions-page';
            }, 2000 );
        </script>
        <p>You will be redirected to the Boxzilla site in a few seconds.</p>
        <p>If not, please click here: <a href="https://boxzillaplugin.com/add-ons/#utm_source=wp-plugin&utm_medium=boxzilla&utm_campaign=extensions-page" target="_blank">View Boxzilla add-on plugins</a></p>
    <?php else : ?>
        <?php foreach ($extensions as $i => $plugin) : ?>
        <div class="plugin">
            <a href="<?php echo esc_url($plugin->page_url); ?>" class="unstyled"><img src="<?php echo esc_url($plugin->image_url); ?>" alt="<?php echo esc_attr($plugin->name); ?>" width="280" height="220"></a>
            <div class="caption">
                <h3><a href="<?php echo esc_url($plugin->page_url); ?>" class="unstyled"><?php echo esc_html($plugin->name); ?></a></h3>
                <p><?php echo esc_html($plugin->description); ?></p>
                <p>
                    <a class="button" href="<?php echo esc_url($plugin->page_url); ?>" title="More about <?php echo esc_attr($plugin->name); ?>">Read More</a>
                    <span class="type">Premium</span>
                </p>
            </div>
        </div>
            <?php
            if (( $i + 1 ) % 4 === 0) {
                echo '<div style="clear: both;"></div>';
            }
            ?>
        <?php endforeach; ?>

        <br style="clear: both;" />

    <?php endif; ?>
</div>

<style type="text/css">
    .plugin {
        width: 280px;
        border: 1px solid #ccc;
        margin: 0 20px 20px 0;
        float: left;
    }

    .plugin .caption {
        padding: 0 20px;
    }

    .plugin .type {
        float: right;
        text-transform: uppercase;
        font-weight: bold;
    }
</style>
