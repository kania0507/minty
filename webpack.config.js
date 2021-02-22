const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require('webpack');
var VueLoader = require("vue-loader");

module.exports = {
  context: path.join(__dirname, 'src'),
  entry: [
	'./app/main'
  ],
  output: {
    path: path.join(__dirname, 'dist'),
    filename: '[name].bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        include: path.join(__dirname, 'src')
      },
      {
        test: /\.css$/,
        loader: 'style-loader!css-loader',
        include: path.join(__dirname, 'src')
      },
{
                test: /\.scss$/,
                use: [{
                        loader: "vue-style-loader"
                    },
                    {
                        loader: "css-loader?sourceMap"
                    },
                    {
                        loader: "sass-loader?sourceMap"
                    }
                ]
            },
      {
        test: /\.(png|jpg)$/,
        loader: 'file-loader',
        include: path.join(__dirname, 'src')
      },
  {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
    ]
  },
  devServer: {
    contentBase: path.join(__dirname, 'dist'),
    inline: true,
    hot: true,
    historyApiFallback: true,
    publicPath: 'dist/', 
  },
  resolve: {

    alias: {
//      'styles': path.resolve(__dirname, 'src/styles'),
//      'images': path.resolve(__dirname, 'src/assets')
    },
	extensions: ['*', '.js', '.vue', '.json']
  },
  plugins: [

new VueLoader.VueLoaderPlugin(),
/*
     
    new HtmlWebpackPlugin({
      template: path.join(__dirname, 'src', 'index.html'),
      inject: 'body',
      excludeChunks: ['home'],
      filename: 'about.html'
    }),
*/
    new webpack.HotModuleReplacementPlugin(),
/*
    new webpack.optimize.CommonsChunkPlugin({
      name: 'common'
    })
*/
  ]
};