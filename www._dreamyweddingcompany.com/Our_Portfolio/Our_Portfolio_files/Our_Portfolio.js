// Created by iWeb 3.0.4 local-build-20121018

function createMediaStream_id1()
{return IWCreateMediaCollection("http://www.dreamyweddingcompany.com/www._dreamyweddingcompany.com/Our_Portfolio/Our_Portfolio_files/rss.xml",true,9,["No photos yet","%d photo","%d photos"],["","%d clip","%d clips"]);}
function initializeMediaStream_id1()
{createMediaStream_id1().load('http://www.dreamyweddingcompany.com/www._dreamyweddingcompany.com/Our_Portfolio',function(imageStream)
{var entryCount=imageStream.length;var headerView=widgets['widget10'];headerView.setPreferenceForKey(imageStream.length,'entryCount');NotificationCenter.postNotification(new IWNotification('SetPage','id1',{pageIndex:0}));});}
function layoutMediaGrid_id1(range)
{createMediaStream_id1().load('http://www.dreamyweddingcompany.com/www._dreamyweddingcompany.com/Our_Portfolio',function(imageStream)
{if(range==null)
{range=new IWRange(0,imageStream.length);}
IWLayoutPhotoGrid('id1',new IWPhotoGridLayout(2,new IWSize(309,232),new IWSize(309,34),new IWSize(309,281),27,27,0,new IWSize(108,95)),new IWPhotoFrame([IWCreateImage('Our_Portfolio_files/spiralbook-creme_ul.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_top.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_ur.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_right.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_lr.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_bottom.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_ll.png'),IWCreateImage('Our_Portfolio_files/spiralbook-creme_left.png')],null,1,1.000000,15.000000,0.000000,0.000000,0.000000,83.000000,40.000000,40.000000,55.000000,106.000000,40.000000,40.000000,32.000000,null,null,null,0.300000),imageStream,range,(null),null,1.000000,null,'../Media/slideshow.html','widget10',null,'widget11',{showTitle:true,showMetric:true})});}
function relayoutMediaGrid_id1(notification)
{var userInfo=notification.userInfo();var range=userInfo['range'];layoutMediaGrid_id1(range);}
function onStubPage()
{var args=window.location.href.toQueryParams();parent.IWMediaStreamPhotoPageSetMediaStream(createMediaStream_id1(),args.id);}
if(window.stubPage)
{onStubPage();}
setTransparentGifURL('../Media/transparent.gif');function applyEffects()
{var registry=IWCreateEffectRegistry();registry.registerEffects({stroke_0:new IWStrokeParts([{rect:new IWRect(-2,2,4,44),url:'Our_Portfolio_files/stroke.png'},{rect:new IWRect(-2,-2,4,4),url:'Our_Portfolio_files/stroke_1.png'},{rect:new IWRect(2,-2,276,4),url:'Our_Portfolio_files/stroke_2.png'},{rect:new IWRect(278,-2,5,4),url:'Our_Portfolio_files/stroke_3.png'},{rect:new IWRect(278,2,5,44),url:'Our_Portfolio_files/stroke_4.png'},{rect:new IWRect(278,46,5,4),url:'Our_Portfolio_files/stroke_5.png'},{rect:new IWRect(2,46,276,4),url:'Our_Portfolio_files/stroke_6.png'},{rect:new IWRect(-2,46,4,4),url:'Our_Portfolio_files/stroke_7.png'}],new IWSize(280,48))});registry.applyEffects();}
function hostedOnDM()
{return false;}
function onPageLoad()
{IWRegisterNamedImage('comment overlay','../Media/Photo-Overlay-Comment.png')
IWRegisterNamedImage('movie overlay','../Media/Photo-Overlay-Movie.png')
loadMozillaCSS('Our_Portfolio_files/Our_PortfolioMoz.css')
NotificationCenter.addObserver(null,relayoutMediaGrid_id1,'RangeChanged','id1')
adjustLineHeightIfTooBig('id2');adjustFontSizeIfTooBig('id2');Widget.onload();fixupAllIEPNGBGs();fixAllIEPNGs('../Media/transparent.gif');IMpreload('Our_Portfolio_files','shapeimage_4','0');IMpreload('Our_Portfolio_files','shapeimage_5','0');applyEffects()
initializeMediaStream_id1()}
function onPageUnload()
{Widget.onunload();}
