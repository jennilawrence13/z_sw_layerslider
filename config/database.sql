-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- 
-- Table `tl_layerslider`
-- 

CREATE TABLE `tl_layerslider` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `alias` varbinary(128) NOT NULL default '',
  `ls_size` varchar(255) NOT NULL default '',
  `ls_autoStart` char(1) NOT NULL default '',
  `ls_firstLayer` int(10) unsigned NOT NULL default '0',
  `ls_twoWaySlideshow` char(1) NOT NULL default '',
  `ls_keybNav` char(1) NOT NULL default '',
  `ls_touchNav` char(1) NOT NULL default '',
  `ls_imgPreload` char(1) NOT NULL default '',
  `ls_navPrevNext` char(1) NOT NULL default '',
  `ls_navStartStop` char(1) NOT NULL default '',
  `ls_navButtons` char(1) NOT NULL default '',
  `ls_skin` varchar(255) NOT NULL default '',
  `ls_skinsPath` varchar(255) NOT NULL default '',
  `ls_pauseOnHover` char(1) NOT NULL default '',
  `ls_globalBGColor` varchar(255) NOT NULL default '',
  `ls_globalBGImage` varchar(255) NOT NULL default '',
  `ls_animateFirstLayer` char(1) NOT NULL default '',
  `ls_isYourLogo` char(1) NOT NULL default '',
  `ls_yourLogo` varchar(255) NOT NULL default '',
  `ls_yourLogoStyle` varchar(255) NOT NULL default '',
  `ls_yourLogoLink` varchar(255) NOT NULL default '',
  `ls_yourLogoTarget` varchar(255) NOT NULL default '',
  `ls_loops` int(10) unsigned NOT NULL default '0',
  `ls_forceLoopNum` char(1) NOT NULL default '',
  `ls_autoPlayVideos` char(1) NOT NULL default '',
  `ls_autoPauseSlideshow` varchar(255) NOT NULL default '',
  `ls_youtubePreview` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_layerslider_slides`
-- 

CREATE TABLE `tl_layerslider_slides` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `type` varchar(255) NOT NULL default '',
  `ls_slideDirection` varchar(255) NOT NULL default '',
  `ls_slideDelay` int(10) unsigned NOT NULL default '0',
  `ls_durationIn` int(10) unsigned NOT NULL default '1000',
  `ls_durationOut` int(10) unsigned NOT NULL default '1000',
  `ls_easingIn` varchar(255) NOT NULL default 'easeInOutQuint',
  `ls_easingOut` varchar(255) NOT NULL default 'easeInOutQuint',
  `ls_delayIn` int(10) unsigned NOT NULL default '0',
  `ls_delayOut` int(10) unsigned NOT NULL default '0',
  
  `cssClass` varchar(255) NOT NULL default '',
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_layerslider_elements`
-- 

CREATE TABLE `tl_layerslider_elements` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `type` varchar(255) NOT NULL default '',
  `ls_slideDirection` varchar(255) NOT NULL default '',
  `ls_slideOutDirection` varchar(255) NOT NULL default '',
  `ls_parallaxIn` varchar(255) NOT NULL default '',
  `ls_parallaxOut` varchar(255) NOT NULL default '',
  `ls_durationIn` int(10) unsigned NOT NULL default '1000',
  `ls_durationOut` int(10) unsigned NOT NULL default '1000',
  `ls_easingIn` varchar(255) NOT NULL default 'easeInOutQuint',
  `ls_easingOut` varchar(255) NOT NULL default 'easeInOutQuint',
  `ls_delayIn` int(10) unsigned NOT NULL default '0',
  `ls_delayOut` int(10) unsigned NOT NULL default '0',
  `ls_posTop` int(10) unsigned NOT NULL default '0',
  `ls_posLeft` int(10) unsigned NOT NULL default '0',
  
  `headline` varchar(255) NOT NULL default '',
  `subheadline` varchar(255) NOT NULL default '',
  `teaser` text NULL,
  
  `singleSRC` varchar(255) NOT NULL default '',
  `alt` varchar(255) NOT NULL default '',
  `size` varchar(64) NOT NULL default '',
  `caption` varchar(255) NOT NULL default '',
  
  `url` varchar(255) NOT NULL default '',
  `target` char(1) NOT NULL default '',
  
  `cssClass` varchar(255) NOT NULL default '',
  `ifBg` char(1) NOT NULL default '',
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `layerslider` int(10) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
