/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/charts/rickshaw",["jquery","Site"],factory);else if("undefined"!=typeof exports)factory(require("jquery"),require("Site"));else{var mod={exports:{}};factory(global.jQuery,global.Site),global.chartsRickshaw=mod.exports}}(this,function(_jquery,_Site){"use strict";var _jquery2=babelHelpers.interopRequireDefault(_jquery),Site=babelHelpers.interopRequireWildcard(_Site);(0,_jquery2.default)(document).ready(function($){Site.run()}),function(){for(var seriesData=[[],[],[]],random=new Rickshaw.Fixtures.RandomData(150),i=0;i<150;i++)random.addData(seriesData);var $element=(0,_jquery2.default)("#exampleChart"),graph=new Rickshaw.Graph({element:$element.get(0),width:$element.width(),height:300,renderer:"line",series:[{color:Config.colors("primary",500),data:seriesData[0],name:"New York"},{color:Config.colors("red",500),data:seriesData[1],name:"London"},{color:Config.colors("green",500),data:seriesData[2],name:"Tokyo"}]});graph.render(),setInterval(function(){random.removeData(seriesData),random.addData(seriesData),graph.update()},2e3);new Rickshaw.Graph.HoverDetail({graph:graph});var legend=new Rickshaw.Graph.Legend({graph:graph,element:document.getElementById("exampleChartLegend")});new Rickshaw.Graph.Behavior.Series.Toggle({graph:graph,legend:legend});new Rickshaw.Graph.Axis.Time({graph:graph}).render(),(0,_jquery2.default)(window).on("resize",function(){graph.configure({width:$element.width()}),graph.render()})}(),function(){for(var seriesData=[[],[],[]],random=new Rickshaw.Fixtures.RandomData(150),i=0;i<150;i++)random.addData(seriesData);var $element=(0,_jquery2.default)("#exampleScatterChart"),graph=new Rickshaw.Graph({element:$element.get(0),width:$element.width(),height:300,renderer:"scatterplot",series:[{color:Config.colors("primary",500),data:seriesData[0],name:"New York"},{color:Config.colors("red",500),data:seriesData[1],name:"London"},{color:Config.colors("green",500),data:seriesData[2],name:"Tokyo"}]});graph.render();new Rickshaw.Graph.HoverDetail({graph:graph});var legend=new Rickshaw.Graph.Legend({graph:graph,element:document.getElementById("exampleScatterLegend")});new Rickshaw.Graph.Behavior.Series.Toggle({graph:graph,legend:legend});(0,_jquery2.default)(window).on("resize",function(){graph.configure({width:$element.width()}),graph.render()})}(),function(){for(var seriesData=[[],[],[]],random=new Rickshaw.Fixtures.RandomData(150),i=0;i<150;i++)random.addData(seriesData);var $element=(0,_jquery2.default)("#exampleStackedChart"),graph=new Rickshaw.Graph({element:$element.get(0),width:$element.width(),height:300,renderer:"bar",series:[{color:Config.colors("primary",700),data:seriesData[0],name:"New York"},{color:Config.colors("primary",500),data:seriesData[1],name:"London"},{color:Config.colors("primary",300),data:seriesData[2],name:"Tokyo"}]});graph.render(),setInterval(function(){random.removeData(seriesData),random.addData(seriesData),graph.update()},2e3);new Rickshaw.Graph.HoverDetail({graph:graph});var legend=new Rickshaw.Graph.Legend({graph:graph,element:document.getElementById("exampleStackedLegend")});new Rickshaw.Graph.Behavior.Series.Toggle({graph:graph,legend:legend});(0,_jquery2.default)(window).on("resize",function(){graph.configure({width:$element.width()}),graph.render()})}(),function(){for(var seriesData=[[],[],[]],random=new Rickshaw.Fixtures.RandomData(150),i=0;i<150;i++)random.addData(seriesData);var $element=(0,_jquery2.default)("#exampleAreaChart"),graph=new Rickshaw.Graph({element:$element.get(0),width:$element.width(),height:300,renderer:"area",stroke:!0,series:[{color:Config.colors("purple",700),data:seriesData[0],name:"New York"},{color:Config.colors("purple",500),data:seriesData[1],name:"London"},{color:Config.colors("purple",300),data:seriesData[2],name:"Tokyo"}]});graph.render(),setInterval(function(){random.removeData(seriesData),random.addData(seriesData),graph.update()},2e3);new Rickshaw.Graph.HoverDetail({graph:graph});var legend=new Rickshaw.Graph.Legend({graph:graph,element:document.getElementById("exampleAreaLegend")});new Rickshaw.Graph.Behavior.Series.Toggle({graph:graph,legend:legend});(0,_jquery2.default)(window).on("resize",function(){graph.configure({width:$element.width()}),graph.render()})}(),function(){for(var seriesData=[[],[],[],[],[]],random=new Rickshaw.Fixtures.RandomData(50),i=0;i<75;i++)random.addData(seriesData);var $element=(0,_jquery2.default)("#exampleMultipleChart"),graph=new Rickshaw.Graph({element:$element.get(0),width:$element.width(),height:300,renderer:"multi",dotSize:5,series:[{name:"temperature",data:seriesData.shift(),color:Config.colors("green",500),renderer:"stack"},{name:"heat index",data:seriesData.shift(),color:Config.colors("cyan",500),renderer:"stack"},{name:"dewpoint",data:seriesData.shift(),color:Config.colors("blue",500),renderer:"scatterplot"},{name:"pop",data:seriesData.shift().map(function(d){return{x:d.x,y:d.y/4}}),color:Config.colors("indigo",500),renderer:"bar"},{name:"humidity",data:seriesData.shift().map(function(d){return{x:d.x,y:1.5*d.y}}),renderer:"line",color:Config.colors("red",500)}]});new Rickshaw.Graph.RangeSlider.Preview({graph:graph,element:document.querySelector("#exampleMultipleSlider")});graph.render();new Rickshaw.Graph.HoverDetail({graph:graph});var legend=new Rickshaw.Graph.Legend({graph:graph,element:document.querySelector("#exampleMultipleLegend")});new Rickshaw.Graph.Behavior.Series.Highlight({graph:graph,legend:legend,disabledColor:function(){return"rgba(0, 0, 0, 0.2)"}}),new Rickshaw.Graph.Behavior.Series.Toggle({graph:graph,legend:legend});(0,_jquery2.default)(window).on("resize",function(){graph.configure({width:$element.width()}),graph.render()})}()});;;