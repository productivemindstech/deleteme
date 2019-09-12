const path = require('path');
const webpack = require('webpack')
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");

const extractCSS = new MiniCssExtractPlugin({
    filename: '[name].css'
});

module.exports = {
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                parallel: true,
                sourceMap: true // set to true if you want JS source maps
            }),
            new OptimizeCSSAssetsPlugin({})
        ],
        splitChunks: {
            chunks: 'all'
        }
    },
    entry: {
        bundle: [
            './site/design/js/jquery-3.2.1.min.js',
            './site/design/js/gdpr-quantcast.js',
            './site/design/js/dom.js',
            './site/design/js/functions.js',
            './site/design/css-source/builds/main.scss'
        ],
        contact: [
            './site/design/css-source/template/pages/_contact-us.scss'
        ],
        skins: [
            './site/design/css-source/builds/skins.scss'
        ],
        searchresults: [
            './site/design/css-source/template/pages/search-results.scss'
        ],
    },
    output: {
        path: path.resolve(__dirname, 'site/design/assets'),
        filename: '[name].js',
        publicPath: '/site/design/assets'
    },

    module: {
        rules: [
            {
                test: /site\/design\/css-source\/.*\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            },
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'script-loader',
                }
            }]
    },

    plugins: [
        new FixStyleOnlyEntriesPlugin(),
        extractCSS,
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            "window.jQuery": "jquery"
        })],

    watchOptions: {
        aggregateTimeout: 1000,
        poll: 1000
    }
}
