# Promotion-Banners
This module will help you to display static promo banner at every where (preferable area: Home Page under Slider)

This module provides faciluty to add Promo Banner Name, Link, Image from backend and displaying it to on Home page.

Last Modified on 24 Sep 2015

Changes: 
1. Set caching for modules images.
2. Set Block caching. 
3. Update ACL

Change log: 
app\design\frontend\default\default\template\promobanner\promobanner.phtml
app\code\local\Bdt\Promobanner\Helper\Data.php
app\code\local\Bdt\Promobanner\Block\Promobanner.php
+ app\code\local\Bdt\Promobanner\etc\adminhtml.xml
app\code\local\Bdt\Promobanner\etc\config.xml

If you want to call this module at Home Page then copy following code and put into CMS >> Pages >> Home Page >> Content
{{block type="promobanner/promobanner" name="promobanner" template="promobanner/promobanner.phtml"}}