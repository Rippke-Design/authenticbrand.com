<section id="flip-cards-<?php echo get_row_index(); ?>" class="flip-cards background-yellow-lighter padding-y-100">
  <!-- <span class=" badge text-bg-danger">Flip Cards</span> -->



  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-12">
        <?php the_sub_field('headline'); ?>
      </div>

      <?php if (have_rows('flip_cards')): ?>
      <?php while (have_rows('flip_cards')): the_row(); ?>
      <div class="col-lg-4">
        <div class="flip-card h-100">
          <div class="flip-card-inner">
            <div class="flip-card-front text-white">
              <div class="card-body">
                <?php the_sub_field('card_front'); ?>
              </div>
            </div>
            <div class="flip-card-back">
              <div class="card-body">
                <?php the_sub_field('card_back'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>




      <!-- <div class="col-lg-4">
        <div class="flip-card h-100">
          <div class="flip-card-inner">
            <div class="flip-card-front text-white">
              <div class="card-body">
                <img src="https://placehold.co/170x170?text=Icon" alt="Card 1"
                  class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
                <h3 class="card-title text-center">
                  <span class="eyebrow">
                    01
                  </span>
                  Short Headline Lorem
                </h3>
              </div>
            </div>
            <div class="flip-card-back">
              <div class="card-body">
                <img src="https://placehold.co/75x75?text=Icon" alt="Card 1"
                  class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
                <h4 class="card-title">Short headline lorem</h4>

                <p class="card-text">
                  We curate your right-fit CMO match based on business model fit, relevant experience, culture
                  alignment, and capacity to
                  support your goals.
                </p>

                <p class="card-text">Your leaders will meet with your matched CMO to ensure your confidence in the
                  fit.</p>

                <p class="card-text">Time: 2-5 business days after you give us the green light!</p>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="flip-card h-100">
          <div class="flip-card-inner">
            <div class="flip-card-front text-white">
              <div class="card-body">
                <img src="https://placehold.co/170x170?text=Icon" alt="Card 1"
                  class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
                <h3 class="card-title text-center">
                  <span class="eyebrow">
                    01
                  </span>
                  Short Headline Lorem
                </h3>
              </div>
            </div>
            <div class="flip-card-back">
              <div class="card-body">
                <img src="https://placehold.co/75x75?text=Icon" alt="Card 1"
                  class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
                <h4 class="card-title">Short headline lorem</h4>

                <p class="card-text">
                  We curate your right-fit CMO match based on business model fit, relevant experience, culture
                  alignment, and capacity to
                  support your goals.
                </p>

                <p class="card-text">Your leaders will meet with your matched CMO to ensure your confidence in the
                  fit.</p>

                <p class="card-text">Time: 2-5 business days after you give us the green light!</p>

              </div>
            </div>
          </div>
        </div>
      </div> -->

    </div>
  </div>


  <!-- <div class="container">
    <div class="row gy-xl-0 gy-5">
      <div class="col-xl-4 col-lg-12">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://placehold.co/100x100?text=Icon" alt="Card 1"
              class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
            <h2 class="mb-3">Card 2</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse repudiandae, eaque veritatis rem
              explicabo
              dolor perferendis voeat!</p>
            <a href="#" class="btn btn-primary">cta button</a>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-12">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://placehold.co/100x100?text=Icon" alt="Card 1"
              class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
            <h2 class="mb-3">Card 2</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse repudiandae, eaque veritatis rem
              explicabo
              dolor perferendis voeat!</p>
            <a href="#" class="btn btn-primary">cta button</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-12">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://placehold.co/100x100?text=Icon" alt="Card 1"
              class="card-icon rounded-circle img-fluid mx-auto d-block mb-5">
            <h2 class="mb-3">Card 3</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse repudiandae, eaque veritatis rem
              explicabo
              dolor perferendis voeat!</p>
            <a href="#" class="btn btn-primary">cta button</a>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</section>