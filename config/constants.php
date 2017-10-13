<?php

use Cake\Routing\Router;

const USER_ADMIN = 'admin';
const USER_CUSTOMER = 'customer';
const USER_EMPLOYEE = 'employee';
const USER_DESIGNER = 'designer';
const USER_MANAGER = 'manager';

const REQUEST_STATUS_PENDING = 'pending';
const REQUEST_STATUS_RUNNING = 'running';
const REQUEST_STATUS_APPROVED = 'approved';
const REQUEST_STATUS_FINISHED = 'finished';
const REQUEST_STATUS_CHANGE_REQUEST = 'change_request';
const REQUEST_STATUS_COMPLETED = 'completed';
const REQUEST_STATUS_CANCELED = 'canceled';

const PORTFOLIO_FEATURED_IMAGE = 'featured';
const PORTFOLIO_GALLERY_IMAGES = 'gallery';

define('USER_IMG_PATH', WWW_ROOT . 'uploads/users/');
define('USER_IMG_URL', Router::url('/', TRUE) . 'uploads/users/');

define('POST_IMAGE_PATH', WWW_ROOT . 'uploads/posts/');
define('POST_IMAGE_URL', Router::url('/', TRUE) . 'uploads/posts/');

define('PORTFOLIO_IMAGE_PATH', WWW_ROOT . 'uploads/portfolio/');
define('PORTFOLIO_IMAGE_URL', Router::url('/', TRUE) . 'uploads/portfolio/');

define('REQUEST_IMG_PATH', WWW_ROOT . 'uploads/requests/');
define('REQUEST_IMG_URL', Router::url('/', TRUE) . 'uploads/requests/');

define('THEME_IMAGES', Router::url('/', TRUE) . '/theme/assets/global/image/');

define('SITE_IMAGES_URL', Router::url('/', TRUE) . '/img/');

define('ATTACHMENT_ICON' ,'<i class="fa fa-paperclip" aria-hidden="true"></i>');
define('DOWNLOAD_ICON' ,'<i class="fa fa-download" aria-hidden="true"></i>');
define('VIEW_ICON', '<i class="fa fa-eye" aria-hidden="true"></i>');

const LOGIN_CHECK = TRUE;
const LOG_ENABLED = TRUE;

const MAIL_FROM_ADDRESS = '';
const MAIL_FROM_NAME = '';

const STATUS_ERROR = 0;
const STATUS_SUCCESS = 1;
const STATUS_API_SESSION = 2;

const STATUS_ACTIVE = 1;
const STATUS_DEACTIVE = 0;

const DISPLAY_DATE_FORMATE = 'd-M-Y';

const MESSAGE_REQUIRED_FIELD = 'Please fill all required field.';
//const MESSAGE_LISTED_SUCCESS = 'data listed successfully.';
//const MESSAGE_LISTED_ERROR = 'data not listed successfully.';
//
//const MESSAGE_SUCCESS = 'successfully.';
//const MESSAGE_ERROR = 'not successfully.';

const MESSAGE_API_SESSION = 'Session is not.';
const NOWRAP_TEMPLATE = ['inputContainer' => '{{content}}'];
const DEVELOPMENT_MODE = FALSE;


/* * **********************************************************
 *          Date
 * ********************************************************** */
const DATE_MYSQL_FORMAT = 'Y-m-d H:i:s';
const DATE_FORMAT_WITH_TIME = 'Y-m-d H:i:s';
const DATE_FORMAT_WITHOUT_TIME = 'Y-m-d';
const DATE_FORMAT_TIME_ONLY = 'H:i:s';
const DATE_FORMAT_TIME_ONLY_WITH_AM_PM = 'H:i:s A';

const DATE_FORMAT_TIMELINE_DAY = 'd';
const DATE_FORMAT_TIMELINE_WEEK_DAY = 'l';
const DATE_FORMAT_TIMELINE_MONTH = 'M';
const DATE_FORMAT_TIMELINE_YEAR = 'Y';


const DATE_FORMAT_POST_CREATED = 'F d, Y';

const WEEK_DAYS = ['1' => 'Sunday', ''];


/* * **********************************************************
 *          Subscription Plans
 * ********************************************************** */
const SUBSCRIPTION_PLAN_FREE = 'free';
const SUBSCRIPTION_PLAN_TRIAL = 'trial';
const SUBSCRIPTION_PLAN_ONE = 'one';
const SUBSCRIPTION_PLAN_TWO = 'two';
const SUBSCRIPTION_PLAN_INACTIVE = 'inactive';


const SUBSCRIPTION_PALN_LABEL = [
    'inactive' => 'Inactive',
    'free' => 'Free',
    'trial' => 'Trial',
    'one' => 'Plan One',
    'two' => 'Plan Two',
];

/* * **********************************************************
 *          NODE JS
 * ********************************************************** */
const NODE_URL = 'http://bhavesh.me:8888/';
const NODE_NEW_MESSAGE_RECIEVED = 'new_message';
const NODE_NEW_MESSAGE_BROADCAST = 'broadcast_new_message';

/* * **********************************************************
 *         CHAT MESSAGE STATUS
 * ********************************************************** */
const MESSAGE_STATUS_READ = 'read';
const MESSAGE_STATUS_UNREAD = 'unread';

/* * **********************************************************
 *         STRIPE STATUS
 * ********************************************************** */

if (DEVELOPMENT_MODE):
    define('STRIPE_API_PUBLIC_KEY', 'pk_test_KRLBDwEokjgA7D7hFKvqbi6B');
    define('STRIPE_API_SECRET_KEY', 'sk_test_xhhUB83ZheRy8jrMzthlb1Ty');
    /*
        define('STRIPE_API_PUBLIC_KEY', 'pk_test_zImXrqqqKcZRIBJGhPa1FdXW');
    define('STRIPE_API_SECRET_KEY', 'sk_test_ygaVnul2x1niefm4DAUOk6hs');
    */
else:
    define('STRIPE_API_PUBLIC_KEY', 'pk_live_bhGIOEFYUrPrLEmi3Nd0F2DW');
    define('STRIPE_API_SECRET_KEY', 'sk_live_IxrYtJYxt8CYIfbzZwTKgmjU');
endif;


const STRIPE_MONTH_SILVER_PLAN_LABEL = 'Graphics Zoo Monthly Silver Plan';
const STRIPE_MONTH_SILVER_PLAN_ID = 'M993D';
const STRIPE_MONTH_SILVER_PLAN_AMOUNT = 99 * 100;
const STRIPE_MONTH_SILVER_PLAN_TRIAL_PERIOD = 14;

const STRIPE_MONTH_GOLDEN_PLAN_LABEL = 'Graphics Zoo Monthly Golden Plan';
const STRIPE_MONTH_GOLDEN_PLAN_ID = 'M1991D';
const STRIPE_MONTH_GOLDEN_PLAN_AMOUNT = 199 * 100;
const STRIPE_MONTH_GOLDEN_PLAN_TRIAL_PERIOD = 14;

const STRIPE_YEAR_SILVER_PLAN_LABEL = 'Graphics Zoo Yearly Silver Plan';
const STRIPE_YEAR_SILVER_PLAN_ID = 'A893D';
const STRIPE_YEAR_SILVER_PLAN_AMOUNT = 1068 * 100;
const STRIPE_YEAR_SILVER_PLAN_TRIAL_PERIOD = 14;

const STRIPE_YEAR_GOLDEN_PLAN_LABEL = 'Graphics Zoo Yearly Golden Plan';
const STRIPE_YEAR_GOLDEN_PLAN_ID = 'A1791D';
const STRIPE_YEAR_GOLDEN_PLAN_AMOUNT = 2148 * 100;
const STRIPE_YEAR_GOLDEN_PLAN_TRIAL_PERIOD = 14;

const POST_EXCERPT_TEXT_LIMIT = 105;
const POST_EXCERPT_WORD_LIMIT = 125;
