const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        //
    ]
);

mix.js("resources/js/pages/login/login.js", "public/js/pages/")
//     .js("resources/js/pages/profile/profile.js", "public/js/pages/profile")
//     .js(
//         "resources/js/pages/profile/update_password.js",
//         "public/js/pages/profile"
//     )
//     .js("resources/js/pages/profile/add-user.js", "public/js/pages/profile")
//     .js("resources/js/pages/profile/view-user.js", "public/js/pages/profile");

// mix.js(
//     "resources/js/pages/notifications/user_email_notification.js",
//     "public/js/pages/notifications"
// );

// mix.js(
//     "resources/js/pages/dashboard/system_logs_action.js",
//     "public/js/pages/dashboard"
// )
//     .js(
//         "resources/js/pages/dashboard/contact_us_action.js",
//         "public/js/pages/dashboard"
//     )
//     .js("resources/js/pages/product/product.js", "public/js/pages/product")
//     .js("resources/js/pages/cart/cart.js", "public/js/pages/cart")
//     .js("resources/js/pages/category/category.js", "public/js/pages/category")
//     .js("resources/js/pages/cart_count/cart_count.js", "public/js/pages/cart_count")
//     .js("resources/js/pages/customer_cart/customer_cart.js", "public/js/pages/customer_cart")
//     .js("resources/js/pages/track_order/track_order.js", "public/js/pages/track_order")
//     .js("resources/js/pages/batch_order/batch_order.js", "public/js/pages/batch_order")
//     .js("resources/js/pages/request_table/request_table.js", "public/js/pages/request_table")
//     .js("resources/js/pages/granted_quote/granted_quote.js", "public/js/pages/granted_quote")
