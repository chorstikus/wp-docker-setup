/** import external dependencies */
import 'jquery';
import 'slick-carousel';

/** import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import contact from './routes/contact';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home,

  /** Routes */
  contact,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
