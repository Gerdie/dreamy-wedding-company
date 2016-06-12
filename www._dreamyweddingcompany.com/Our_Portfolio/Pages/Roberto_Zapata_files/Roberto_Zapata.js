// Created by iWeb 3.0.4 local-build-20121018

function createMediaStream_id1()
{return IWCreatePhotocast("http://www.dreamyweddingcompany.com/www._dreamyweddingcompany.com/Our_Portfolio/Pages/Roberto_Zapata_files/rss.xml",true);}
function initializeMediaStream_id1()
{createMediaStream_id1().load('http://www.dreamyweddingcompany.com/www._dreamyweddingcompany.com/Our_Portfolio/Pages',function(imageStream)
{var entryCount=imageStream.length;var headerView=widgets['widget1'];headerView.setPreferenceForKey(imageStream.length,'entryCount');NotificationCenter.postNotification(new IWNotification('SetPage','id1',{pageIndex:0}));});}
function layoutMediaGrid_id1(range)
{createMediaStream_id1().load('http://www.dreamyweddingcompany.com/www._dreamyweddingcompany.com/Our_Portfolio/Pages',function(imageStream)
{if(range==null)
{range=new IWRange(0,imageStream.length);}
IWLayoutPhotoGrid('id1',new IWPhotoGridLayout(3,new IWSize(166,166),new IWSize(166,32),new IWSize(204,213),27,27,0,new IWSize(16,16)),new IWPhotoFrame([IWCreateImage('Roberto_Zapata_files/Formal_inset_01.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_02.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_03.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_06.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_09.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_08.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_07.png'),IWCreateImage('Roberto_Zapata_files/Formal_inset_04.png')],null,0,0.600000,1.000000,1.000000,1.000000,1.000000,14.000000,14.000000,14.000000,14.000000,191.000000,262.000000,191.000000,262.000000,null,null,null,0.100000),imageStream,range,null,null,1.000000,{backgroundColor:'rgb(0, 0, 0)',reflectionHeight:100,reflectionOffset:2,captionHeight:100,fullScreen:0,transitionIndex:2},'../../Media/slideshow.html','widget1','widget2','widget3')});}
function relayoutMediaGrid_id1(notification)
{var userInfo=notification.userInfo();var range=userInfo['range'];layoutMediaGrid_id1(range);}
function onStubPage()
{var args=window.location.href.toQueryParams();parent.IWMediaStreamPhotoPageSetMediaStream(createMediaStream_id1(),args.id);}
if(window.stubPage)
{onStubPage();}
setTransparentGifURL('../../Media/transparent.gif');function hostedOnDM()
{return false;}
function onPageLoad()
{IWRegisterNamedImage('comment overlay','../../Media/Photo-Overlay-Comment.png')
IWRegisterNamedImage('movie overlay','../../Media/Photo-Overlay-Movie.png')
loadMozillaCSS('Roberto_Zapata_files/Roberto_ZapataMoz.css')
NotificationCenter.addObserver(null,relayoutMediaGrid_id1,'RangeChanged','id1')
Widget.onload();fixAllIEPNGs('../../Media/transparent.gif');initializeMediaStream_id1()
performPostEffectsFixups()}
function onPageUnload()
{Widget.onunload();}
