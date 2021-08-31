<?php

/**
 * Template Name: Contact Page
 *
 * This file controls the display of the
 * Contact page.
 *
 * @package Templates
 *
 */

get_header();
get_template_part('partials/template-part', 'head');

if (have_posts()) : while (have_posts()) : the_post();


?>

<main id="contact-page">
    <article>

        <?php
        
        // Vars
        $header = get_field('recruiters_header');
        $recruiters = get_field('recruiter');
        
        if ($recruiters) {
            echo '<section id="recruiter-contain">';

            if ($header) {
                echo '<header class="container">';
                echo wp_kses_post($header);
                echo '</header>';
            }

            echo '<div class="container">';
            echo '<div class="row">';

            foreach ($recruiters as $post) {
                setup_postdata($post);

                //-------------------
                // Recruiter Cards
                //-------------------

                // Vars
                $dept = get_field('department'); // Department
                $sort = get_field('applicant_sort'); // Applicant Sort
                $size = 'thumbnail'; // Image uplaod size


                //---------------
                // HR Recruiter
                //---------------


                $hr = get_field('hr_recruiter');

                /* Headshot */
                $hrimg = $hr['head_shot']; // Headshot
                $hrh = wp_get_attachment_image($hrimg, $size);

                $hrn = $hr['name']; // Name
                $hrp = $hr['phone_number']; // Phone Number
                

                //----------------
                // MPD Recruiter
                //----------------


                $mpd = get_field('mpd_recruiter');

                /* Headshot */
                $mpdimg = $mpd['head_shot']; // Headshot
                $mpdh = wp_get_attachment_image($mpdimg, $size);

                $mpdn = $mpd['name']; // Name
                $mpdp = $mpd['phone_number']; // Phone Number
                

                //-----------------
                // PST Recruiter
                //-----------------


                $pst = get_field('pst_recruiter');

                /* Headshot */
                $pstimg = $pst['head_shot']; // Headshot
                $psth = wp_get_attachment_image($pstimg, $size);

                $pstn = $pst['name']; // Name
                $pstp = $pst['phone_number']; // Phone Number

                echo '<div class="col-md-6">';
                echo '<div class="recruiter">';

                if ($dept) {
                    echo '<h2>';
                    esc_html_e($dept);
                    echo ' <span>Recruit Applicants</span>';
                    echo '</h2>';

                    if ($dept == 'Basic Police') {
                        echo '<h3>Last Name ';
                        esc_html_e($sort);
                        echo '</h3>';
                    }
                }

                if ($hr) {
                    if ($hrh) {
                        echo $hrh;
                    }
                    echo '<p>';
                    echo '<a href="mailto:joinmpd@memphistn.gov?subject=MPD Recruit ';
                    echo $dept;
                    if ($dept === 'Basic Police') {
                        echo ' Last Name ' .$sort. '';
                    }
                    echo '">';
                    if ($hrn) {
                        esc_html_e($hrn);
                    } else {
                        echo 'Email ' .$dept. '';
                    }
                    
                    echo '</a>';
                    if ($hrp) {
                        echo '<br>';
                        echo 'HR Recruiter<br>';
                        echo '<a href="tel:';
                        esc_html_e($hrp);
                        echo '">';
                        esc_html_e($hrp);
                        echo '</a>';
                    }
                    echo '</p>';
                }

                if ($mpd) {
                    if ($mpdh) {
                        echo $mpdh;
                    }
                    echo '<p>';
                    echo '<a href="mailto:joinmpd@memphistn.gov?subject=MPD Recruit ';
                    echo $dept;
                    if ($dept === 'Basic Police') {
                        echo ' Last Name ' .$sort. '';
                    }
                    echo '">';
                    if ($mpdn) {
                        esc_html_e($mpdn);
                    } else {
                        echo 'Email ' .$dept. '';
                    }
                    
                    echo '</a>';
                    if ($mpdp) {
                        echo '<br>';
                        echo 'MPD REcruiter<br>';
                        echo '<a href="tel:';
                        esc_html_e($mpdp);
                        echo '">';
                        esc_html_e($mpdp);
                        echo '</a>';
                    }

                    echo '</p>';
                }

                if ($pst) {
                    if ($psth) {
                        echo $psth;
                    }
                    echo '<p>';
                    echo '<a href="mailto:joinmpd@memphistn.gov?subject=MPD Recruit ';
                    echo $dept;
                    echo '">';
                    if ($pstn) {
                        esc_html_e($pstn);
                    } else {
                        echo 'Email ' .$dept. '';
                    }
                    
                    echo '</a>';
                    if ($pstp) {
                        echo '<br>';
                        echo 'PST Recruiter<br>';
                        echo '<a href="tel:';
                        esc_html_e($pstp);
                        echo '">';
                        esc_html_e($pstp);
                        echo '</a>';
                    }
                    echo '</p>';
                }
                        
                echo '</div>'; // .recruiter
                echo '</div>'; // .col-md-6
            }

            wp_reset_postdata();
                    
            echo '</div>'; // .row
            echo '</div>'; // .container
            echo '</section>'; // #recruiter-contain
        }

        echo '<section id="contact-page-content">';
        echo '<div class="container">';
        the_content();
        echo '</div>';
        echo '</section>';

        // Page Footer (Mayor & Police Seal)
        $m = get_field('mayor'); // Mayor
        $d = get_field('director'); // Director of Police Services
        $t = get_field('training'); // Training Commander

        $image = get_field('police_seal'); // Image Upload
        $size = 'full';
        $seal = wp_get_attachment_image($image, $size);


        if ($m) {
            echo '<section id="contact-page-footer">';
            echo '<div class="container">';
            echo '<div class="row">';

            if ($image) {
                echo '<div class="col-md">';
                echo $seal;
                echo '</div>';
            }

            echo '<div class="col-md">';
            echo '<div id="leadership">';
            echo '<p><strong>' .$m. ',</strong> <em>City of Memphis Mayor</em></p>';
            echo '<p><strong>' .$d. ',</strong> <em>Police Chief</em></p>';
            echo '<p><strong>' .$t. ',</strong> <em>Training Commander</em></p>';
            echo '</div>'; // #leadership
            echo '</div>'; // .col-md

            echo '</div>'; // .row
            echo '</div>'; // .container
            echo '</section>'; // #contact-page-footer
        }
        
        ?>

    </article>
</main>

<?php endwhile; else:

    get_404_template();

endif;

get_footer();