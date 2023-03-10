<?php
/**
 * WCMS - WEX Simple CMS
 * https://github.com/vedees/wcms
 * Copyright (C) 2018 Evgenii Vedegis <vedegis@gmail.com>
 * https://github.com/vedees/wcms/blob/master/LICENSE
 */
require 'core/initialize.php';

$user = new wcms\classes\auth\Login;
$user->require_login();?>

<?php $page_title = $lang['dashboardTitle'];
      $page = 'dashboard';
      $counter = new wcms\classes\Counter();?>

<?php include('includes/header.php') ?>

<section>
  <div class="container">
    <h1 class="ui-title-1"> <?php echo $lang['dashboard'] ?> </h1>
    <p class="ui-text-small"> <?php echo $lang['dashboardDescr'] ?> </p>
  </div>
</section>

<section id="charts">
  <div class="container">
    <div class="chart-pie__wrapper">
      <div class="chart-item ui-card ui-card--shadow">
        <span class="ui-title-3"> <?php echo $lang['countFiles'] ?> </span>
        <counter-component
          html='<?php echo $counter->total_html(); ?>'
          img='<?php echo $counter->total_img(); ?>'
          css='<?php echo $counter->total_css(); ?>'
          js='<?php echo $counter->total_js(); ?>'>
        </counter-component>
      </div>
      <div class="file-list">
        <!-- html -->
        <div class="file-item ui-card ui-card--shadow">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"></path> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 "></polygon> <path style="fill:#EC6630;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"></path> <g> <path style="fill:#FFFFFF;" d="M17.455,42.924V53h-1.641v-4.539h-4.361V53H9.785V42.924h1.668v4.416h4.361v-4.416H17.455z"></path> <path style="fill:#FFFFFF;" d="M27.107,42.924v1.121H24.1V53h-1.654v-8.955h-3.008v-1.121H27.107z"></path> <path style="fill:#FFFFFF;" d="M36.705,42.924h1.668V53h-1.668v-6.932l-2.256,5.605H33l-2.27-5.605V53h-1.668V42.924h1.668 l2.994,6.891L36.705,42.924z"></path> <path style="fill:#FFFFFF;" d="M42.57,42.924v8.832h4.635V53h-6.303V42.924H42.57z"></path> </g> <g> <path style="fill:#EC6630;" d="M23.207,16.293c-0.391-0.391-1.023-0.391-1.414,0l-6,6c-0.391,0.391-0.391,1.023,0,1.414l6,6 C21.988,29.902,22.244,30,22.5,30s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L17.914,23l5.293-5.293 C23.598,17.316,23.598,16.684,23.207,16.293z"></path> <path style="fill:#EC6630;" d="M41.207,22.293l-6-6c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L39.086,23 l-5.293,5.293c-0.391,0.391-0.391,1.023,0,1.414C33.988,29.902,34.244,30,34.5,30s0.512-0.098,0.707-0.293l6-6 C41.598,23.316,41.598,22.684,41.207,22.293z"></path> </g> </g></svg>
          <span class="file-name">HTML: <p><?php echo $counter->total_html(); ?></p> </span>
        </div>
        <!-- css -->
        <div class="file-item ui-card ui-card--shadow">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"></path> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 "></polygon> <path style="fill:#0096E6;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"></path> <g> <path style="fill:#FFFFFF;" d="M23.58,51.975c-0.374,0.364-0.798,0.638-1.271,0.82s-0.984,0.273-1.531,0.273 c-0.602,0-1.155-0.109-1.661-0.328s-0.948-0.542-1.326-0.971s-0.675-0.966-0.889-1.613c-0.214-0.647-0.321-1.395-0.321-2.242 s0.107-1.593,0.321-2.235c0.214-0.643,0.511-1.178,0.889-1.606s0.822-0.754,1.333-0.978s1.062-0.335,1.654-0.335 c0.547,0,1.058,0.091,1.531,0.273s0.897,0.456,1.271,0.82l-1.135,1.012c-0.228-0.265-0.48-0.456-0.759-0.574 s-0.567-0.178-0.868-0.178c-0.337,0-0.658,0.063-0.964,0.191s-0.579,0.344-0.82,0.649s-0.431,0.699-0.567,1.183 s-0.21,1.075-0.219,1.777c0.009,0.684,0.08,1.267,0.212,1.75s0.314,0.877,0.547,1.183s0.497,0.528,0.793,0.67 s0.608,0.212,0.937,0.212s0.636-0.06,0.923-0.178s0.549-0.31,0.786-0.574L23.58,51.975z"></path> <path style="fill:#FFFFFF;" d="M31.633,50.238c0,0.364-0.075,0.718-0.226,1.06s-0.362,0.643-0.636,0.902s-0.61,0.467-1.012,0.622 s-0.856,0.232-1.367,0.232c-0.219,0-0.444-0.012-0.677-0.034s-0.467-0.062-0.704-0.116s-0.463-0.13-0.677-0.226 s-0.398-0.212-0.554-0.349l0.287-1.176c0.128,0.073,0.289,0.144,0.485,0.212s0.398,0.132,0.608,0.191s0.419,0.107,0.629,0.144 s0.405,0.055,0.588,0.055c0.556,0,0.982-0.13,1.278-0.39s0.444-0.645,0.444-1.155c0-0.31-0.104-0.574-0.314-0.793 s-0.472-0.417-0.786-0.595s-0.654-0.355-1.019-0.533s-0.706-0.388-1.025-0.629s-0.583-0.526-0.793-0.854s-0.314-0.738-0.314-1.23 c0-0.446,0.082-0.843,0.246-1.189s0.385-0.641,0.663-0.882s0.602-0.426,0.971-0.554s0.759-0.191,1.169-0.191 c0.419,0,0.843,0.039,1.271,0.116s0.774,0.203,1.039,0.376c-0.055,0.118-0.118,0.248-0.191,0.39s-0.142,0.273-0.205,0.396 c-0.063,0.123-0.118,0.226-0.164,0.308s-0.073,0.128-0.082,0.137c-0.055-0.027-0.116-0.063-0.185-0.109s-0.166-0.091-0.294-0.137 s-0.296-0.077-0.506-0.096s-0.479-0.014-0.807,0.014c-0.183,0.019-0.355,0.07-0.52,0.157s-0.31,0.193-0.438,0.321 s-0.228,0.271-0.301,0.431s-0.109,0.313-0.109,0.458c0,0.364,0.104,0.658,0.314,0.882s0.47,0.419,0.779,0.588 s0.647,0.333,1.012,0.492s0.704,0.354,1.019,0.581s0.576,0.513,0.786,0.854S31.633,49.7,31.633,50.238z"></path> <path style="fill:#FFFFFF;" d="M39.043,50.238c0,0.364-0.075,0.718-0.226,1.06s-0.362,0.643-0.636,0.902s-0.61,0.467-1.012,0.622 s-0.856,0.232-1.367,0.232c-0.219,0-0.444-0.012-0.677-0.034s-0.467-0.062-0.704-0.116s-0.463-0.13-0.677-0.226 s-0.398-0.212-0.554-0.349l0.287-1.176c0.128,0.073,0.289,0.144,0.485,0.212s0.398,0.132,0.608,0.191s0.419,0.107,0.629,0.144 s0.405,0.055,0.588,0.055c0.556,0,0.982-0.13,1.278-0.39s0.444-0.645,0.444-1.155c0-0.31-0.104-0.574-0.314-0.793 s-0.472-0.417-0.786-0.595s-0.654-0.355-1.019-0.533s-0.706-0.388-1.025-0.629s-0.583-0.526-0.793-0.854s-0.314-0.738-0.314-1.23 c0-0.446,0.082-0.843,0.246-1.189s0.385-0.641,0.663-0.882s0.602-0.426,0.971-0.554s0.759-0.191,1.169-0.191 c0.419,0,0.843,0.039,1.271,0.116s0.774,0.203,1.039,0.376c-0.055,0.118-0.118,0.248-0.191,0.39s-0.142,0.273-0.205,0.396 s-0.118,0.226-0.164,0.308s-0.073,0.128-0.082,0.137c-0.055-0.027-0.116-0.063-0.185-0.109s-0.166-0.091-0.294-0.137 s-0.296-0.077-0.506-0.096s-0.479-0.014-0.807,0.014c-0.183,0.019-0.355,0.07-0.52,0.157s-0.31,0.193-0.438,0.321 s-0.228,0.271-0.301,0.431s-0.109,0.313-0.109,0.458c0,0.364,0.104,0.658,0.314,0.882s0.47,0.419,0.779,0.588 s0.647,0.333,1.012,0.492s0.704,0.354,1.019,0.581s0.576,0.513,0.786,0.854S39.043,49.7,39.043,50.238z"></path> </g> <g> <path style="fill:#0096E6;" d="M19.5,19v-4c0-0.551,0.448-1,1-1c0.553,0,1-0.448,1-1s-0.447-1-1-1c-1.654,0-3,1.346-3,3v4 c0,1.103-0.897,2-2,2c-0.553,0-1,0.448-1,1s0.447,1,1,1c1.103,0,2,0.897,2,2v4c0,1.654,1.346,3,3,3c0.553,0,1-0.448,1-1 s-0.447-1-1-1c-0.552,0-1-0.449-1-1v-4c0-1.2-0.542-2.266-1.382-3C18.958,21.266,19.5,20.2,19.5,19z"></path> <path style="fill:#0096E6;" d="M39.5,21c-1.103,0-2-0.897-2-2v-4c0-1.654-1.346-3-3-3c-0.553,0-1,0.448-1,1s0.447,1,1,1 c0.552,0,1,0.449,1,1v4c0,1.2,0.542,2.266,1.382,3c-0.84,0.734-1.382,1.8-1.382,3v4c0,0.551-0.448,1-1,1c-0.553,0-1,0.448-1,1 s0.447,1,1,1c1.654,0,3-1.346,3-3v-4c0-1.103,0.897-2,2-2c0.553,0,1-0.448,1-1S40.053,21,39.5,21z"></path> </g> </g></svg>
          <span class="file-name">CSS: <p><?php echo $counter->total_css(); ?></p> </span>
        </div>
        <!-- js -->
        <div class="file-item ui-card ui-card--shadow">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"></path> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 "></polygon> <path style="fill:#EEAF4B;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"></path> <g> <path style="fill:#FFFFFF;" d="M26.021,42.719v7.848c0,0.474-0.087,0.873-0.26,1.196c-0.174,0.323-0.406,0.583-0.697,0.779 c-0.292,0.196-0.627,0.333-1.005,0.41s-0.769,0.116-1.169,0.116c-0.201,0-0.436-0.021-0.704-0.062s-0.547-0.104-0.834-0.191 s-0.563-0.185-0.827-0.294c-0.265-0.109-0.488-0.232-0.67-0.369l0.697-1.107c0.091,0.063,0.221,0.13,0.39,0.198 s0.353,0.132,0.554,0.191c0.2,0.06,0.41,0.111,0.629,0.157s0.424,0.068,0.615,0.068c0.482,0,0.868-0.094,1.155-0.28 s0.439-0.504,0.458-0.95v-7.711H26.021z"></path> <path style="fill:#FFFFFF;" d="M34.184,50.238c0,0.364-0.075,0.718-0.226,1.06s-0.362,0.643-0.636,0.902s-0.611,0.467-1.012,0.622 c-0.401,0.155-0.857,0.232-1.367,0.232c-0.219,0-0.444-0.012-0.677-0.034s-0.468-0.062-0.704-0.116 c-0.237-0.055-0.463-0.13-0.677-0.226s-0.399-0.212-0.554-0.349l0.287-1.176c0.127,0.073,0.289,0.144,0.485,0.212 s0.398,0.132,0.608,0.191c0.209,0.06,0.419,0.107,0.629,0.144c0.209,0.036,0.405,0.055,0.588,0.055c0.556,0,0.982-0.13,1.278-0.39 s0.444-0.645,0.444-1.155c0-0.31-0.105-0.574-0.314-0.793c-0.21-0.219-0.472-0.417-0.786-0.595s-0.654-0.355-1.019-0.533 c-0.365-0.178-0.707-0.388-1.025-0.629c-0.319-0.241-0.584-0.526-0.793-0.854c-0.21-0.328-0.314-0.738-0.314-1.23 c0-0.446,0.082-0.843,0.246-1.189s0.385-0.641,0.663-0.882s0.602-0.426,0.971-0.554s0.759-0.191,1.169-0.191 c0.419,0,0.843,0.039,1.271,0.116c0.428,0.077,0.774,0.203,1.039,0.376c-0.055,0.118-0.119,0.248-0.191,0.39 c-0.073,0.142-0.142,0.273-0.205,0.396c-0.064,0.123-0.119,0.226-0.164,0.308c-0.046,0.082-0.073,0.128-0.082,0.137 c-0.055-0.027-0.116-0.063-0.185-0.109s-0.167-0.091-0.294-0.137c-0.128-0.046-0.297-0.077-0.506-0.096 c-0.21-0.019-0.479-0.014-0.807,0.014c-0.183,0.019-0.355,0.07-0.52,0.157s-0.311,0.193-0.438,0.321 c-0.128,0.128-0.229,0.271-0.301,0.431c-0.073,0.159-0.109,0.313-0.109,0.458c0,0.364,0.104,0.658,0.314,0.882 c0.209,0.224,0.469,0.419,0.779,0.588c0.31,0.169,0.646,0.333,1.012,0.492c0.364,0.159,0.704,0.354,1.019,0.581 s0.576,0.513,0.786,0.854C34.078,49.261,34.184,49.7,34.184,50.238z"></path> </g> <g> <path style="fill:#EEAF4B;" d="M19.5,19v-4c0-0.551,0.448-1,1-1c0.553,0,1-0.448,1-1s-0.447-1-1-1c-1.654,0-3,1.346-3,3v4 c0,1.103-0.897,2-2,2c-0.553,0-1,0.448-1,1s0.447,1,1,1c1.103,0,2,0.897,2,2v4c0,1.654,1.346,3,3,3c0.553,0,1-0.448,1-1 s-0.447-1-1-1c-0.552,0-1-0.449-1-1v-4c0-1.2-0.542-2.266-1.382-3C18.958,21.266,19.5,20.2,19.5,19z"></path> <circle style="fill:#EEAF4B;" cx="27.5" cy="18.5" r="1.5"></circle> <path style="fill:#EEAF4B;" d="M39.5,21c-1.103,0-2-0.897-2-2v-4c0-1.654-1.346-3-3-3c-0.553,0-1,0.448-1,1s0.447,1,1,1 c0.552,0,1,0.449,1,1v4c0,1.2,0.542,2.266,1.382,3c-0.84,0.734-1.382,1.8-1.382,3v4c0,0.551-0.448,1-1,1c-0.553,0-1,0.448-1,1 s0.447,1,1,1c1.654,0,3-1.346,3-3v-4c0-1.103,0.897-2,2-2c0.553,0,1-0.448,1-1S40.053,21,39.5,21z"></path> <path style="fill:#EEAF4B;" d="M27.5,24c-0.553,0-1,0.448-1,1v3c0,0.552,0.447,1,1,1s1-0.448,1-1v-3 C28.5,24.448,28.053,24,27.5,24z"></path> </g> </g></svg>
          <span class="file-name">JS: <p><?php echo $counter->total_js(); ?></p> </span>
        </div>
        <!-- img -->
        <div class="file-item ui-card ui-card--shadow">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"></path> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 "></polygon> <circle style="fill:#F3D55B;" cx="18.931" cy="14.431" r="4.569"></circle> <polygon style="fill:#26B99A;" points="6.5,39 17.5,39 49.5,39 49.5,28 39.5,18.5 29,30 23.517,24.517 "></polygon> <path style="fill:#14A085;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"></path> <g> <path style="fill:#FFFFFF;" d="M21.426,42.65v7.848c0,0.474-0.087,0.873-0.26,1.196c-0.173,0.323-0.406,0.583-0.697,0.779 c-0.292,0.196-0.627,0.333-1.005,0.41C19.085,52.961,18.696,53,18.295,53c-0.201,0-0.436-0.021-0.704-0.062 c-0.269-0.041-0.547-0.104-0.834-0.191s-0.563-0.185-0.827-0.294c-0.265-0.109-0.488-0.232-0.67-0.369l0.697-1.107 c0.091,0.063,0.221,0.13,0.39,0.198c0.168,0.068,0.353,0.132,0.554,0.191c0.2,0.06,0.41,0.111,0.629,0.157 s0.424,0.068,0.615,0.068c0.483,0,0.868-0.094,1.155-0.28s0.439-0.504,0.458-0.95V42.65H21.426z"></path> <path style="fill:#FFFFFF;" d="M25.514,52.932h-1.641V42.855h2.898c0.428,0,0.852,0.068,1.271,0.205 c0.419,0.137,0.795,0.342,1.128,0.615c0.333,0.273,0.602,0.604,0.807,0.991s0.308,0.822,0.308,1.306 c0,0.511-0.087,0.973-0.26,1.388c-0.173,0.415-0.415,0.764-0.725,1.046c-0.31,0.282-0.684,0.501-1.121,0.656 s-0.921,0.232-1.449,0.232h-1.217V52.932z M25.514,44.1v3.992h1.504c0.2,0,0.398-0.034,0.595-0.103 c0.196-0.068,0.376-0.18,0.54-0.335s0.296-0.371,0.396-0.649c0.1-0.278,0.15-0.622,0.15-1.032c0-0.164-0.023-0.354-0.068-0.567 c-0.046-0.214-0.139-0.419-0.28-0.615c-0.142-0.196-0.34-0.36-0.595-0.492C27.5,44.166,27.163,44.1,26.744,44.1H25.514z"></path> <path style="fill:#FFFFFF;" d="M39.5,47.736v3.896c-0.21,0.265-0.444,0.48-0.704,0.649s-0.533,0.308-0.82,0.417 s-0.583,0.187-0.889,0.232C36.781,52.978,36.479,53,36.178,53c-0.602,0-1.155-0.109-1.661-0.328s-0.948-0.542-1.326-0.971 c-0.378-0.429-0.675-0.966-0.889-1.613c-0.214-0.647-0.321-1.395-0.321-2.242s0.107-1.593,0.321-2.235 c0.214-0.643,0.51-1.178,0.889-1.606c0.378-0.429,0.822-0.754,1.333-0.978c0.51-0.224,1.062-0.335,1.654-0.335 c0.547,0,1.057,0.091,1.531,0.273c0.474,0.183,0.897,0.456,1.271,0.82l-1.135,1.012c-0.219-0.265-0.47-0.456-0.752-0.574 c-0.283-0.118-0.574-0.178-0.875-0.178c-0.337,0-0.659,0.063-0.964,0.191c-0.306,0.128-0.579,0.344-0.82,0.649 c-0.242,0.306-0.431,0.699-0.567,1.183s-0.21,1.075-0.219,1.777c0.009,0.684,0.08,1.276,0.212,1.777 c0.132,0.501,0.314,0.911,0.547,1.23s0.497,0.556,0.793,0.711c0.296,0.155,0.608,0.232,0.937,0.232c0.1,0,0.234-0.007,0.403-0.021 c0.168-0.014,0.337-0.036,0.506-0.068c0.168-0.032,0.33-0.075,0.485-0.13c0.155-0.055,0.269-0.132,0.342-0.232v-2.488h-1.709 v-1.121H39.5z"></path> </g> </g></svg>
          <span class="file-name">IMG: <p><?php echo $counter->total_img(); ?></p> </span>
        </div>
        <!-- backups -->
        <div class="file-item ui-card ui-card--shadow">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"></path> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 "></polygon> <path style="fill:#556080;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"></path> <g> <path style="fill:#FFFFFF;" d="M25.266,42.924v1.326l-4.799,7.205l-0.273,0.219h5.072V53h-6.699v-1.326l4.799-7.205l0.287-0.219 h-5.086v-1.326H25.266z"></path> <path style="fill:#FFFFFF;" d="M29.271,53h-1.668V42.924h1.668V53z"></path> <path style="fill:#FFFFFF;" d="M33.414,53h-1.641V42.924h2.898c0.428,0,0.852,0.068,1.271,0.205 c0.419,0.137,0.795,0.342,1.128,0.615c0.333,0.273,0.602,0.604,0.807,0.991s0.308,0.822,0.308,1.306 c0,0.511-0.087,0.973-0.26,1.388c-0.173,0.415-0.415,0.764-0.725,1.046c-0.31,0.282-0.684,0.501-1.121,0.656 s-0.921,0.232-1.449,0.232h-1.217V53z M33.414,44.168v3.992h1.504c0.2,0,0.398-0.034,0.595-0.103 c0.196-0.068,0.376-0.18,0.54-0.335s0.296-0.371,0.396-0.649c0.1-0.278,0.15-0.622,0.15-1.032c0-0.164-0.023-0.354-0.068-0.567 c-0.046-0.214-0.139-0.419-0.28-0.615c-0.142-0.196-0.34-0.36-0.595-0.492c-0.255-0.132-0.593-0.198-1.012-0.198H33.414z"></path> </g> <g> <path style="fill:#C8BDB8;" d="M28.5,24v-2h2v-2h-2v-2h2v-2h-2v-2h2v-2h-2v-2h2V8h-2V6h-2v2h-2v2h2v2h-2v2h2v2h-2v2h2v2h-2v2h2v2 h-4v5c0,2.757,2.243,5,5,5s5-2.243,5-5v-5H28.5z M30.5,29c0,1.654-1.346,3-3,3s-3-1.346-3-3v-3h6V29z"></path> <path style="fill:#C8BDB8;" d="M26.5,30h2c0.552,0,1-0.447,1-1s-0.448-1-1-1h-2c-0.552,0-1,0.447-1,1S25.948,30,26.5,30z"></path> </g> </g></svg>
          <span class="file-name"><?php echo $lang['backups']; ?>: <p><?php echo $counter->total_backup(); ?></p> </span>
        </div>
        <!-- backups creater -->
        <div class="file-item ui-card ui-card--shadow">
          <?php $backup = new wcms\classes\Backup;
                $backup->create(); ?>
          <form action="index.php" method="POST">
            <button class="button-primary" type="submit" name="backup_create"><?php echo $lang['createBackup']; ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<section id="message" style="padding: 30px 0;">-->
<!--  <div class="container">-->
<!--    <div class="message__wrapper">-->
<!--      <notify-component lang="--><?php //echo $_SESSION['lang']; ?><!--"></notify-component>-->
<!--      <news-component lang="--><?php //echo $_SESSION['lang']; ?><!--"></news-component>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->
<!---->
<!--<section id="info" style="padding: 30px 0;">-->
<!--  <div class="container">-->
<!--    <div class="wcms-info__wrapper">-->
<!--      <version-component currentver='--><?php //echo WCMS_VERSION; ?><!--'></version-component>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

<?php include('includes/footer.php') ?>
