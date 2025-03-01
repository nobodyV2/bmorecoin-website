<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BMoreCoin | Tokenomics</title>
    <meta property="og:image" content="https://www.bmorecoin.com/ready.png"/>
    <!-- Still Missing og:url, og:type, og:title, og:description, fb:app_id -->
    <!-- Custom Scripts -->
    <script type="text/javascript" src="bmorecoin.js"></script>
    <?PHP 
     include_once('content.php'); 
     include_once('analytics.php');
     $date_format = 'F j, Y';
    ?>
    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?PHP echo $SEO_description;?>">
    <meta name="keywords" content="<?PHP echo $SEO_keywords;?>">
    <meta name="author" content="<?PHP echo $SEO_author;?>">
    
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#6366f1">
    <link rel="shortcut icon" href="assets/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="assets/vendor/boxicons/css/boxicons.min.css"/>

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="assets/css/theme.min.css">

    <!-- Page loading styles -->
    <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #131022;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

    <!-- Theme mode -->
    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== undefined && mode === 'dark') {
        root.classList.add('dark-mode');
      } else {
        root.classList.remove('dark-mode');
      }
    </script>

    <!-- Page loading scripts -->
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
    </script>
    
    
  <script>
  console.log('Pulling Tokenomics');
  $.get( "https://www.mdwestserve.com/BMoreCoin/tokenomics.php", function( data ) {
    //console.log(data);
    const json = JSON.parse(data);
    for (var key in json) {
       if (json.hasOwnProperty(key)) {
         if (json[key].name == 'current_circulation'){
           var html = "Current Circulation: " + new Intl.NumberFormat().format(json[key].value) + ' BALTx';
           let element1 = document.getElementById("current_circulation");
           element1.innerHTML = html;
         }
         if (json[key].name == 'future_circulation'){
           var html = "Future Circulation: " + new Intl.NumberFormat().format(json[key].value) + ' BALTx';
           let element1 = document.getElementById("future_circulation");
           element1.innerHTML = html;
         }
         if (json[key].name == 'percent_mined'){
           var html = "Mining Complete: " + json[key].value + '%';
           let element1 = document.getElementById("percent_mined");
           element1.innerHTML = html;
         }
         if (json[key].name == 'last_reward'){
           var html = "Latest Mining Reward: " + json[key].value + ' BALTx';
           let element1 = document.getElementById("last_reward");
           element1.innerHTML = html;
         }
         if (json[key].name == 'last_height'){
           var html = "Latest Block: " + json[key].value;
           let element1 = document.getElementById("last_height");
           element1.innerHTML = html;
         }
         if (json[key].name == 'peer_count'){
           // bump peer count
           var peers = json[key].value;
           var html = "p2p Network: " + peers + ' nodes';
           let element1 = document.getElementById("peer_count");
           element1.innerHTML = html;
         }
         if (json[key].name == 'last_reward_block'){
           var html = "Last Rewarding Block: " + json[key].value;
           let element1 = document.getElementById("last_reward_block");
           element1.innerHTML = html;
         }
         if (json[key].name == 'blockchain_used'){
           var html = "BALTx Blockchain Used: " + json[key].value + '%';
           let element1 = document.getElementById("blockchain_used");
           element1.innerHTML = html;
         }
         
         
         console.log(json[key].name);
         console.log(json[key].value);
       }
    }
  });
  //console.log('Done Tokenomics');
  </script>
  </head>


  <!-- Body -->
  <body>

    <!-- Page loading spinner -->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>


    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="page-wrapper">


      <!-- Navbar -->
      <?PHP include_once('navbar.php'); ?>


 


      <!-- Page content -->
      <section class="container mt-4 mb-lg-5 pt-lg-2 pb-5">

        <!-- Page title + Layout switcher + Search form -->
        <div class="row align-items-end gy-3 mb-4 pb-lg-3 pb-1">
          <div class="col-lg-5 col-md-4">
            <h1 class="mb-2 mb-md-0">Tokenomics</h1>
          </div>
        </div>

        <!-- Blog grid -->
        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-md-4 gy-2">

          <!-- Item -->
          <div class="col pb-3">
            <article class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="done.png" class="card-img-top" alt="Current Circulation">
              </div>
              <div class="card-body pb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Circulation</a>
                  <span class="fs-sm text-muted"><?PHP echo date($date_format);?></span>
                </div>
                <h3 class="h5 mb-0">
                  <a href="#">Current Circulation</a>
                </h3>
                <div id="current_circulation" name="current_circulation">Loading...</div>
              </div>
              <div class="card-footer py-4">
                The number of BALTx mined and in circulation.
              </div>
            </article>
          </div>
          
          
          <!-- Item -->
          <div class="col pb-3">
            <article class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="ready.png" class="card-img-top" alt="Ready to Mine">
              </div>
              <div class="card-body pb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Circulation</a>
                  <span class="fs-sm text-muted"><?PHP echo date($date_format);?></span>
                </div>
                <h3 class="h5 mb-0">
                  <a href="#">Future Circulation</a>
                </h3>
                <div id="future_circulation" name="future_circulation">Loading...</div>
              </div>
              <div class="card-footer py-4">
                The number of BALTx not yet mined.
              </div>
            </article>
          </div>

          
          <!-- Item -->
          <div class="col pb-3">
            <article class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="complete.png" class="card-img-top" alt="Mining Completed">
              </div>
              <div class="card-body pb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Mining</a>
                  <span class="fs-sm text-muted"><?PHP echo date($date_format);?></span>
                </div>
                <h3 class="h5 mb-0">
                  <a href="#">Mining Completed</a>
                </h3>
                <div id="percent_mined" name="percent_mined">Loading...</div>
              </div>
              <div class="card-footer py-4">
                The percentage of blocks mined rewarding miners.
              </div>
            </article>
          </div>
          
          <!-- Item -->
          <div class="col pb-3">
            <article class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="complete.png" class="card-img-top" alt="Last Mining Reward">
              </div>
              <div class="card-body pb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Mining</a>
                  <span class="fs-sm text-muted"><?PHP echo date($date_format);?></span>
                </div>
                <h3 class="h5 mb-0">
                  <a href="#">Last Mining Reward</a>
                </h3>
                <div id="last_height" name="last_height">Loading...</div>
                <div id="last_reward" name="last_reward">Loading...</div>
                <div id="last_reward_block" name="last_reward_block">Loading...</div>
              </div>
              <div class="card-footer py-4">
                The last reward paid to miners.
              </div>
            </article>
          </div>
          
          <!-- Item -->
          <div class="col pb-3">
            <article class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="p2p.png" class="card-img-top" alt="Connected Peers">
              </div>
              <div class="card-body pb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Network</a>
                  <span class="fs-sm text-muted"><?PHP echo date($date_format);?></span>
                </div>
                <h3 class="h5 mb-0">
                  <a href="#">Connected Peers</a>
                </h3>
                <div id="peer_count" name="peer_count">Loading...</div>
              </div>
              <div class="card-footer py-4">
                Servers seen running the BALTx daemon.
              </div>
            </article>
          </div>
          
          <!-- Item -->
          <div class="col pb-3">
            <article class="card border-0 shadow-sm h-100">
              <div class="position-relative">
                <img src="complete.png" class="card-img-top" alt="Percent Blockchain Used">
              </div>
              <div class="card-body pb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Network</a>
                  <span class="fs-sm text-muted"><?PHP echo date($date_format);?></span>
                </div>
                <h3 class="h5 mb-0">
                  <a href="#">Percent Blockchain Used</a>
                </h3>
                <div id="blockchain_used" name="blockchain_used">Loading...</div>
              </div>
              <div class="card-footer py-4">
                The last transactions will go into our top block of 500,000,000
              </div>
            </article>
          </div>
          
          
         </section>


      <!-- Subscription CTA -->
      <section class="py-5 bg-secondary">
        <div class="container py-md-3 py-lg-5">
          <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11">
              <h2 class="h1 d-md-inline-block position-relative mb-md-5 mb-sm-4 text-sm-start text-center">
                Don't Want to Miss Anything?
  
                <!-- Arrow shape -->
                <svg class="d-md-block d-none position-absolute top-0 ms-4 ps-1" style="left: 100%;" xmlns="http://www.w3.org/2000/svg" width="65" height="68" fill="#6366f1"><path d="M53.9527 51.0012c8.396-10.5668 2.0302-26.0134-11.7481-26.7511-.6899-.0646-1.4612.0015-2.1258.0431.1243 9.0462-4.1714 18.8896-11.5618 21.3814-6.6695 2.2133-10.3337-4.2224-7.5813-9.676 3.2966-6.4755 9.103-11.8504 16.1678-13.8189-.5654-5.6953-3.3436-10.7672-9.485-12.48517C17.2678 6.8204 6.49364 16.3681 4.98841 26.127c-.09276 1.0297-1.68569.9497-1.59293-.0801C3.98732 12.9139 19.7395 2.55212 31.9628 8.5787c4.7253 2.3813 7.2649 7.3963 7.9368 13.067 7.4237-.9311 14.5154 3.3683 18.3422 9.5422 4.3988 7.1623 2.3584 15.1401-2.6322 21.1108-.7826.9653-2.3331-.3572-1.6569-1.2975zM26.7754 32.1845c-1.9411 2.2411-4.076 5.0872-4.3542 8.1764-.3036 2.9829 3.7601 3.0525 5.4905 2.7645 2.1568-.3863 3.7221-2.3164 4.8863-4.0419 2.6228-3.6308 4.3657-9.0752 4.4844-14.2563-4.0808 1.279-7.6514 4.2327-10.507 7.3573zm24.6311 25.592c-.7061-2.9738-1.2243-6.1031-1.1591-9.143.0423-1.242 1.767-1.0805 1.8313.1372.1284 2.435.815 4.8532 1.4764 7.1651l4.1619-1.4098c1.0153-.4586 2.4373-1.5714 3.6544-1.1804.6087.1954.7347.7264.6475 1.3068-.2302 1.3976-2.4683 1.9147-3.5901 2.398-1.8429.7619-3.6293 1.2865-5.5477 1.7298-.6391.1476-1.3233-.3665-1.4746-1.0037z"/></svg>
              </h2>
  
              <!-- Title + checkboxes -->
              <div class="row gy-4 align-items-center mb-lg-5 mb-4 pb-3">
                <div class="col-md-3">
                  <h3 class="h5 mb-0 text-sm-start text-center">Sign up for Newsletters</h3>
                </div>
                <div class="col-md-9">
                  <div class="row row-cols-sm-3 row-cols-2 gy-2">
                    <div class="col">
                      <div class="form-check mb-0">
                        <input type="checkbox" id="s-daily-newsletter" class="form-check-input">
                        <label for="s-daily-newsletter" class="form-check-label">Daily Newsletter</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check mb-0">
                        <input type="checkbox" id="s-advertising-updates" class="form-check-input" checked>
                        <label for="s-advertising-updates" class="form-check-label">Advertising Updates</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check mb-0">
                        <input type="checkbox" id="s-week-in-review" class="form-check-input">
                        <label for="s-week-in-review" class="form-check-label">Week in Review</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check mb-0">
                        <input type="checkbox" id="s-event-updates" class="form-check-input">
                        <label for="s-event-updates" class="form-check-label">Event Updates</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check mb-0">
                        <input type="checkbox" id="s-startups-weekly" class="form-check-input">
                        <label for="s-startups-weekly" class="form-check-label">Startups Weekly</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check mb-0">
                        <input id="s-podcasts" type="checkbox" class="form-check-input">
                        <label for="s-podcasts" class="form-check-label">Podcasts</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Email field -->
              <form class="d-flex flex-sm-row flex-column mb-3 needs-validation" novalidate>
                <div class="input-group me-sm-3 mb-sm-0 mb-3">
                  <i class="bx bx-envelope position-absolute start-0 top-50 translate-middle-y ms-3 zindex-5 fs-5 text-muted"></i>
                  <input type="email" class="form-control form-control-lg rounded-3 ps-5" placeholder="Your email" required>
                  <div class="invalid-tooltip position-absolute start-0 top-0 mt-n4">Please provide a valid email address!</div>
                </div>
                <button class="btn btn-lg btn-primary">Subscribe *</button>
              </form>
              <div class="form-text fs-sm text-sm-start text-center">
                * Yes, I agree to the <a href="#">terms</a> and <a href="#">privacy policy</a>.
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>


    <?PHP include_once('footer.php');?>

    <!-- Back to top button -->
    <a href="#top" class="btn-scroll-top" data-scroll>
      <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
      <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
    </a>


    <!-- Vendor Scripts -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Main Theme Script -->
    <script src="assets/js/theme.min.js"></script>
  </body>
</html>
