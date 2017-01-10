var path = require("path");
var webpack = require('webpack')
var LiveReloadPlugin = require('webpack-livereload-plugin');

module.exports = {
    entry: {
        app: [
            './resources/assets/js/main.js',
        ],

    },
    output: {
        path: path.join('public'),
        filename: 'index.js',
        publicPath: '/public/'
    },
    module: {
        loaders: [
            {
                test: /\.woff2?$|\.ttf$|\.eot$|\.svg$/,
                loader: 'file'
            },
            {
                test: /\.(scss|sass)$/,
                loaders: ['style-loader', 'css-loader', 'sass-loader'],
            }
        ]
    },
    plugins: [
        new LiveReloadPlugin()
    ]

};