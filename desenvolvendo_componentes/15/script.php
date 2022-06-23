<?php
defined('_JEXEC') or die;
class com_bibliotecaInstallerScript
{

  function createSampleImages()
  {
    jimport( 'joomla.filesystem.file' );
    if(!file_exists(JPATH_SITE . "/images/com_biblioteca/"))
    {
      JFolder::create(JPATH_SITE. "/images/com_biblioteca/");
    }
    if(!file_exists(JPATH_SITE. "/images/com_biblioteca/12regras.jpeg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/12regras.jpeg", JPATH_SITE. "/images/com_biblioteca/12regras.jpeg");
    }
    if(!file_exists(JPATH_SITE. "/images/com_biblioteca/5linguagens.jpg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/5linguagens.jpg", JPATH_SITE. "/images/com_biblioteca/5linguagens.jpg");
    }
    if(!file_exists(JPATH_SITE. "/images/com_biblioteca/dom-casmurro.jpg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/dom-casmurro.jpg", JPATH_SITE. "/images/com_biblioteca/dom-casmurro.jpg");
    }
    if(!file_exists(JPATH_SITE. "/images/com_biblioteca/garota-do-lago.jpg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/garota-do-lago.jpg", JPATH_SITE. "/images/com_biblioteca/garota-do-lago.jpg");
    }
     if(!file_exists(JPATH_SITE. "/images/com_biblioteca/narnia.jpg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/narnia.jpg", JPATH_SITE. "/images/com_biblioteca/narnia.jpg");
    }
    if(!file_exists(JPATH_SITE. "/images/com_biblioteca/porque-fazemos.jpg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/porque-fazemos.jpg", JPATH_SITE. "/images/com_biblioteca/porque-fazemos.jpg");
    }
    if(!file_exists(JPATH_SITE. "/images/com_biblioteca/reacionario.jpg"))
    {
      JFile::copy(JPATH_SITE."/media/com_biblioteca/images/reacionario.jpg", JPATH_SITE. "/images/com_biblioteca/reacionario.jpg");
    }               
  }

  function install($parent)
  {    
    $parent->getParent()->setRedirectURL('index.php?option=com_biblioteca');
  }

  function uninstall($parent)
  {
    echo '<p>' . JText::_('COM_BIBLIOTECA_UNINSTALL_TEXT') . '</p>';
  }

  function update($parent)
  {
    //$this->createSampleImages();
    echo '<p>' . JText::_('COM_BIBLIOTECA_UPDATE_TEXT') . '</p>';
  }

  function preflight($type, $parent)
  {
    echo '<p>' . JText::_('COM_BIBLIOTECA_PREFLIGHT_' . $type . '_TEXT') . '</p>';
  }
  
  function postflight($type, $parent)
  {
    $this->createSampleImages();
    echo '<p>' . JText::_('COM_BIBLIOTECA_POSTFLIGHT_' . $type .'_TEXT') . '</p>';
  }

}