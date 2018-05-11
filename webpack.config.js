/**
 * Webpack Config
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

// depenencies
const path = require('path');
const webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const WebpackShellPlugin = require('webpack-shell-plugin');

// constants
const BUILD_DIR = path.resolve(__dirname, 'dist');
const SRC_DIR = path.resolve(__dirname, 'src');
const SASS_DIR = path.resolve(__dirname, 'scss');

module.exports = {
	entry: {
		bundle: [SRC_DIR + '/index.js'],
		jquery: [SRC_DIR + '/jquery.js'],
		screen: [SASS_DIR + '/screen.scss'],
		foundation: [SASS_DIR + '/foundation.scss'],
		login: [SASS_DIR + '/login.scss'],
	},
	output: {
		filename: '[name].js',
		path: BUILD_DIR
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: ExtractTextPlugin.extract({
					fallback: 'style-loader',
					use: ['css-loader', 'sass-loader']
				})
			}, {
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'babel-loader'
			},{
				test: /\.svg$/,
				loader: 'svg-url-loader'
			},{
				test: /\.(png|jpg|gif|woff|woff2)$/,
				loader: 'url-loader?limit=100000'
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin('./dist/*'),
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery'
		}),
		new ExtractTextPlugin({
			filename: 'css/[name].css'
		}),
		new WebpackShellPlugin({
			onBuildEnd: [
				'rm ./dist/foundation.js',
				'rm ./dist/login.js',
				'rm ./dist/screen.js'
			]
		})
	],
	optimization: {
		minimizer: [
			new UglifyJsPlugin({
				cache: true,
				parallel: true,
				sourceMap: true
			}),
			new OptimizeCSSAssetsPlugin({})
		]
	},
};
