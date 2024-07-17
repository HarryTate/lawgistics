
<?php

function pies_shortcode($atts)
{
    $atts = shortcode_atts(
        [
            'lookup' => '',
        ],
        $atts,
        'pies'
    );

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = [
        'post_type'      => 'pies',
        'posts_per_page' => 5,
        'paged'          => $paged,
    ];

    if (!empty($atts['lookup'])) {
        $args['meta_query'] = [
            [
                'key'     => 'pie_type',
                'value'   => $atts['lookup'],
                'compare' => 'LIKE',
            ],
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '<div class="lawgistics">
                    <div class="pies-list">
                        <table class="pies-table">
                        <thead>
                            <tr>
                                <th>Pie Type</th>
                                <th>Description</th>
                                <th>Ingredients</th>
                            </tr>
                        </thead>
                        <tbody>';

        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<tr class="pie-item">
                            <td>' . get_field('pie_type') . '</td>
                            <td>' . get_field('description') . '</td>
                            <td>' . get_field('ingredients') . '</td>
                        </tr>';
        }

        $output .= '</tbody>
                </table>
            </div>';

        $big = 999999999;
        $output .= '<ul class="pagination">';
        $output .= paginate_links([
            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'  => '?paged=%#%',
            'current' => max(1, $paged),
            'total'   => $query->max_num_pages,
        ]);
        $output .= '</ul></div>';
    } else {
        $output = '<p>No pies found.</p>';
    }

    wp_reset_postdata();

    return $output;
}
add_shortcode('pies', 'pies_shortcode');
