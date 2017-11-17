const webpack            = require('webpack');
const path               = require('path');
const ExtractTextPlugin  = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin  = require('html-webpack-plugin');
const MinifyPlugin       = require("babel-minify-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin')

new webpack.DefinePlugin({
  'process.env': {
    NODE_ENV: JSON.stringify('production')
  }
}),
new webpack.optimize.UglifyJsPlugin();

const HtmlWebpackPluginConfig = new HtmlWebpackPlugin({
  template: './assets/layout.twig',
  filename: '../templates/layout.twig',
  inject: 'body'
});

const extractSass = new ExtractTextPlugin({
    filename: "[name].[contenthash:base64:5].css"
});

let pathsToClean = [
  'public/*.js',
  'public/*.css'
];

var BUILD_DIR = path.resolve(__dirname, './public');
var APP_DIR = path.resolve(__dirname, './assets');

var config = {
    entry: [APP_DIR + '/js/index.js', APP_DIR + '/scss/main.scss'],
    output: {
        path: BUILD_DIR,
        filename: '[name].[hash].js',
        'publicPath': '/'
    },
    module : {
        loaders : [
            { test: /\.js$/, loader: 'babel-loader', exclude: /node_modules/ },
            { test: /\.jsx$/, loader: 'babel-loader', exclude: /node_modules/ },
            {
                test: /\.scss$/,
                use: extractSass.extract({
                    use: [{
                        loader: "css-loader",
                        options: {
                            minimize: true,
                            modules: true,
                            localIdentName: '[name]__[local]___[hash:base64:5]'
                        }
                    }, {
                        loader: "sass-loader"
                    }],
                    // use style-loader in development
                    fallback: "style-loader"
                })
            }
        ]
    },
    plugins: [
        extractSass,
        HtmlWebpackPluginConfig,
        new MinifyPlugin,
        new CleanWebpackPlugin(pathsToClean, {verbose:true, watch:true}),
    ]
};

module.exports = config;
