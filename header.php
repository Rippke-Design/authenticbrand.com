<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo get_the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
  <meta name="description" content="<? echo bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!--<div class="dev-mode" id="dev-mode">
    <input type="checkbox" class="dev-mode-toggle" id="dev-mode-toggle" />
    <label for="dev-mode-toggle">Hide Section Names</label>
  </div>-->

  <header>
    <nav class="navbar navbar-expand-xl">
      <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/docs/assets/img/ab-logo.png" alt="Authentic Brand Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
            <?php
          // Get the main navigation links from ACF
          $main_nav_links = get_field('main_nav_links', 'option');
          
          if ($main_nav_links) :
            foreach ($main_nav_links as $nav_item) :
              $main_nav_link = $nav_item['main_nav_link'];
              $dropdown_menu = $nav_item['dropdown_menu'];
              $dropdown_menu_columns = $nav_item['dropdown_menu_columns'];
              
              // Determine if this nav item has a dropdown
              $has_dropdown = $dropdown_menu && $dropdown_menu_columns;
              $dropdown_class = $has_dropdown ? 'dropdown' : '';
              $dropdown_toggle = $has_dropdown ? 'dropdown-toggle' : '';
              $dropdown_attrs = $has_dropdown ? 'data-bs-toggle="dropdown"' : '';
          ?>
            <li class="nav-item <?php echo $dropdown_class; ?>">
              <a class="nav-link <?php echo $dropdown_toggle; ?>" href="<?php echo esc_url($main_nav_link['url']); ?>"
                <?php echo $dropdown_attrs; ?>
                <?php if ($main_nav_link['target']) : ?>target="<?php echo esc_attr($main_nav_link['target']); ?>"
                <?php endif; ?>>
                <?php echo esc_html($main_nav_link['title']); ?>
              </a>

              <?php if ($has_dropdown && $dropdown_menu_columns) : ?>
              <div class="dropdown-menu multi-column-dropdown"
                style="padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5);">
                <div class="row gap-4">
                  <?php foreach ($dropdown_menu_columns as $column) : ?>
                  <div class="col">
                    <?php 
                        if ($column['dropdown_menu_section']) :
                          foreach ($column['dropdown_menu_section'] as $section) :
                            $section_heading = $section['dropdown_menu_section_heading'];
                            $section_links = $section['dropdown_menu_links'];
                        ?>
                    <?php if ($section_heading) : ?>
                    <h4><?php echo esc_html($section_heading); ?></h4>
                    <?php endif; ?>

                    <?php if ($section_links) : ?>
                    <ul class="list-unstyled">
                      <?php foreach ($section_links as $link_item) : 
                                $link = $link_item['dropdown_menu_link'];
                              ?>
                      <li>
                        <a class="dropdown-item" href="<?php echo esc_url($link['url']); ?>"
                          <?php if ($link['target']) : ?>target="<?php echo esc_attr($link['target']); ?>"
                          <?php endif; ?>>
                          <?php echo esc_html($link['title']); ?>
                        </a>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <?php 
                          // Add HR separator if this isn't the last section
                          $current_index = array_search($section, $column['dropdown_menu_section']);
                          $total_sections = count($column['dropdown_menu_section']);
                          if ($current_index < $total_sections - 1) : ?>
                    <hr>
                    <?php endif; ?>

                    <?php 
                          endforeach;
                        endif;
                        ?>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endif; ?>
            </li>
            <?php 
            endforeach;
          endif;
          ?>



            <!-- <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle">Solutions</a>
            <div class="dropdown-menu multi-column-dropdown" style=" padding-right: calc(var(--bs-gutter-x) * 0.5);
											    padding-left: calc(var(--bs-gutter-x) * 0.5);">
              <div class="row gap-4">
                <div class="col">
                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>

                  </ul>
                </div>
                <div class="col">
                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 2 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 2 </a></li>
                  </ul>
                  <hr>

                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 3 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 3 </a></li>
                  </ul>
                </div>
              </div>

            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle">Who We Serve</a>
            <div class="dropdown-menu multi-column-dropdown" style=" padding-right: calc(var(--bs-gutter-x) * 0.5);
											    padding-left: calc(var(--bs-gutter-x) * 0.5);">
              <div class="row gap-4">
                <div class="col">
                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>

                  </ul>
                </div>
                <div class="col">
                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 2 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 2 </a></li>
                  </ul>
                  <hr>

                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 3 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 3 </a></li>
                  </ul>
                </div>
              </div>

            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle">Resources</a>
            <div class="dropdown-menu multi-column-dropdown" style=" padding-right: calc(var(--bs-gutter-x) * 0.5);
											    padding-left: calc(var(--bs-gutter-x) * 0.5);">
              <div class="row gap-4">
                <div class="col">
                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>

                  </ul>
                </div>
                <div class="col">
                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 2 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 2 </a></li>
                  </ul>
                  <hr>

                  <h4>Heading</h4>
                  <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 3 </a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 3 </a></li>
                  </ul>
                </div>
              </div>

            </div>
          </li> -->


            <li class="nav-item">
              <?php
            $cta_button = get_field('main_nav_cta_button', 'option');
            if ($cta_button && isset($cta_button['url'])) :
              $cta_target = isset($cta_button['target']) ? $cta_button['target'] : '_self';
            ?>
              <a href="<?php echo esc_url($cta_button['url']); ?>" class="btn btn-primary"
                target="<?php echo esc_attr($cta_target); ?>">
                <?php echo esc_html($cta_button['title']); ?>
              </a>
              <?php endif; ?>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#searchModal"
                aria-label="Open search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                  <circle cx="7.74142" cy="8.03319" r="6.74142" stroke="#00B4AD" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M12.4302 13.0721L15.0732 15.7082" stroke="#00B4AD" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </a>

              <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-md">
                  <div class="modal-content">
                    <div class="modal-body">
                      <form class="d-flex" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input class="form-control me-2" type="search" name="s" placeholder="Search..."
                          aria-label="Search" value="<?php echo get_search_query(); ?>">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>