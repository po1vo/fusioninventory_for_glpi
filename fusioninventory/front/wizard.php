<?php

/*
   ------------------------------------------------------------------------
   FusionInventory
   Copyright (C) 2010-2011 by the FusionInventory Development Team.

   http://www.fusioninventory.org/   http://forge.fusioninventory.org/
   ------------------------------------------------------------------------

   LICENSE

   This file is part of FusionInventory project.

   FusionInventory is free software: you can redistribute it and/or modify
   it under the terms of the GNU Affero General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   FusionInventory is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
   GNU Affero General Public License for more details.

   You should have received a copy of the GNU Affero General Public License
   along with Behaviors. If not, see <http://www.gnu.org/licenses/>.

   ------------------------------------------------------------------------

   @package   FusionInventory
   @author    David Durieux
   @co-author 
   @copyright Copyright (c) 2010-2011 FusionInventory team
   @license   AGPL License 3.0 or (at your option) any later version
              http://www.gnu.org/licenses/agpl-3.0-standalone.html
   @link      http://www.fusioninventory.org/
   @link      http://forge.fusioninventory.org/projects/fusioninventory-for-glpi/
   @since     2010
 
   ------------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
   define('GLPI_ROOT', '../../..');
}

require_once GLPI_ROOT."/inc/includes.php";

Html::header($LANG['plugin_fusioninventory']['title'][0],$_SERVER["PHP_SELF"],"plugins","fusioninventory","wizard-start");

PluginFusioninventoryProfile::checkRight("fusioninventory", "task","r");

if (!isset($_SERVER['HTTP_REFERER'])
        OR (isset($_SERVER['HTTP_REFERER']) AND
        !strstr($_SERVER['HTTP_REFERER'], "wizard.php")
        AND !isset($_GET['wizz']))) {
   PluginFusioninventoryMenu::displayMenu("mini");
}
if (isset($_GET["wizz"])) {
   if (method_exists('PluginFusioninventoryWizard',$_GET["wizz"])) {
      $ariane = '';
      if (isset($_GET['ariane'])) {
         $ariane = $_GET['ariane'];
      }
      PluginFusioninventoryWizard::$_GET["wizz"]($ariane);
   }
} else {
   PluginFusioninventoryWizard::w_start();
}

Html::footer();

?>