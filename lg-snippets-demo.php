<?php
/*
 * Template Name: Snippets Demo
 */
get_header();
?>

<div style="padding:100px">
    <h1>Snippet Usage Demo</h1>
    <p>
        raw snippet direct output:
        <?php do_action('lg_snippet_raw', 'demo_snippet') ?>
    </p>
    <p>
        raw snippet return output:
        <?php
            $return = new stdClass();
            do_action('lg_snippet_raw', 'demo_snippet', $return);
            var_dump($return->data);
        ?>
    </p>
    <p>
        html snippet direct output:
        <?php do_action('lg_snippet_html', 'demo_snippet') ?>
    </p>
    <p>
        html snippet return output:
        <?php
            $return = new stdClass();
            do_action('lg_snippet_html', 'demo_snippet', $return);
            var_dump($return->data);
        ?>
    </p>
</div>

<?php
get_footer();
?>