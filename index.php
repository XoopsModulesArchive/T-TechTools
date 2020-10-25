<?php

//    Project: T-TechTools Version 1.0
//    Author: Danni aka Kittin
//    Date: March 12-04
//    Contact: http://t-tech.org
//
//    Copyright (C) 2004 T-Tech Inc.
//
//    This program is free software; you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation; either version 2 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with this program; if not, write to the Free Software
//    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA

include '../../mainfile.php';
require XOOPS_ROOT_PATH . '/header.php';
include('js/Tech.js');
//1=Show & 0=Do not show
$xoopsOption['show_rblock'] = 1;
$xoopsOption['show_lblock'] = 1;

function Tools()
{
    global $module_name;

    include 'header.php';

    echo " 
<table width='100%'  border='1' cellspacing='2' cellpadding='2'>
  <tr class='even'>
    <td><a href='index.php?opi=HTMLJS'>HTML to JS </a></td>
    <td>Convert your html code to javascript. </td>
  </tr>
  <tr class='odd'>
    <td><a href='index.php?opi=HTMLASP'>HTML to ASP </a></td>
    <td>Convert your html code to asp. </td>
  </tr>
  <tr class='even'>
    <td><a href='index.php?opi=HTMLPHP'>HTML to PHP</a></td>
    <td>Convert your html code to php. </td>
  </tr>
  <tr class='odd'>
    <td><a href='index.php?opi=HTMLPERL'>HTML to PERL</a> </td>
    <td>Convert your html code to perl. </td>
  </tr>
  <tr class='even'>
    <td><a href='index.php?opi=HTMLEDIT'>Online Editor</a></td>
    <td>Online html editor. (Create html to convert :P )</td>
  </tr>
  <tr class='odd'>
    <td><a href='index.php?opi=Techpop'>PopUp Creator</a></td>
    <td>Create  pop-up windows.</td>
  </tr>
  <tr class='even'>
    <td><a href='index.php?opi=DeDupe'>De-Duper</a></td>
    <td>Will check a list for duplicates and remove the dupes. (Great for sorting email lists or proxies ect) </td>
  </tr>
  <tr class='odd'>
    <td><a href='index.php?opi=MTags'>Meta Tags </a></td>
    <td>Generate meta tags. </td>
  </tr>
</table>";

    include('footer.php');
}

function HTMLPHP()
{
    global $module_name;

    include 'header.php';

    include('js/TechHTMLPHP.js');

    echo " 

<TABLE width='100%' border=0>
<TR class='head'>
<TD align=middle>
<br><h4>HTML to PHP</h4>
<FORM name=htphp>
<TABLE cellSpacing=2 cellPadding=2 width='100%' border=0>
<TR class='even'>
<TD align=middle>Paste Your Code</TD>
</TR>
</TABLE>
<TR class='odd'>
<TD align=middle>
<TEXTAREA name=input rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
</TD>
</TR>
<TR class='even'>
<TD><p align='center'>PHP Code Created</p></TD></TR>
<TR class='odd'>
<TD align=middle><TEXTAREA name=output rows=15 wrap=VIRTUAL cols=68></TEXTAREA> 
</TD>
</TR>
<TR class='even'>
<TD align=middle><p align='center'>
    <INPUT class=button onclick=htmlphp() type=button value='Convert'>
    <INPUT class=button onclick=javascript:this.form.output.focus();this.form.output.select(); type=button value='Select-All' name=button wszystko>
    <INPUT class=button onclick=reset(input.output) type=button value='Clear-Form'> 
  </p></TD></TR></FORM></TD></TR>
</TABLE>";

    include('footer.php');
}

function HTMLJS()
{
    global $module_name;

    include 'header.php';

    include('js/TechHTMLJS.js');

    echo "
<TABLE width='100%' border=0>
<TR class='head'>
<TD align=middle>
<center><br>
<h4>HTML to JS </h4>
<FORM name=htphp>
  <TABLE cellSpacing=2 cellPadding=2 width='100%' border=0>
    <TR class='even'>
    <TD align=middle>Paste Your Code Below </TD>
    </TR>
  </TABLE>
  <TR class='odd'>
<TD align=middle><div align='center'>
  <TEXTAREA name=input rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
</div></TD>
</TR>
<TR class='even'>
<TD align=middle><p align='center>'>JS Code Below </p>  </TD>
</TR>
<TR class='odd'>
<TD align=middle><div align='center'>
  <TEXTAREA name=output rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
</div></TD>
</TR>
<TR class='even'>
<TD align=middle><div align='center>'>
  <INPUT class=button onclick=htmlphp() type=button value='Convert'>
  <INPUT class=button onclick=javascript:this.form.output.focus();this.form.output.select(); type=button value='Select-All' name=button wszystko>
  <INPUT class=button onclick=reset(input.output) type=button value='Clear-Form'> 
</div></TD>
</TR>
</FORM>
</CENTER>
</TD>
</TR>
<TR>
</TR>
</TABLE>";

    include('footer.php');
}

function HTMLASP()
{
    global $module_name;

    include 'header.php';

    include('js/TechHTMLASP.js');

    echo " 
<TABLE width='100%' border=0>
<TR class='head'>
<TD align=middle>
<div align='center'><br>
</div><h4 align='center'>HTML to ASP</h4><FORM name=htphp>
  <div align='left'>
    <TABLE cellSpacing=2 cellPadding=2 width=\'100%\' border=0>
      <TR class='even'>
      <TD align='center'>Paste Your Code Below</TD>
      </TR>
    </TABLE>
  </div>
  <TR class='odd'>
  <TD align=middle>
    <div align='center'>
      <TEXTAREA name=input rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
    </div></TD>
  </TR>
  <TR class='even'>
  <TD align=middle><div align='center'>Converted Code Below</div></TD>
  </TR>
  <TR class='odd'>
  <TD align=middle>
    <div align='center'>
      <TEXTAREA name=output rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
    </div></TD>
  </TR>
  <TR class='even'>
  <TD align=middle>
    <div align='center'>
      <INPUT class=button onclick=htmlphp() type=button value='Convert'>
      <INPUT class=button onclick=javascript:this.form.output.focus();this.form.output.select(); type=button value='Select-All' name=button wszystko>
      <INPUT class=button onclick=reset(input.output) type=button value='Clear-Form'>
    </div></TD>
  </TR>
</FORM></TD>
</TR>
</TABLE>";

    include('footer.php');
}

function HTMLPERL()
{
    global $module_name;

    include 'header.php';

    include('js/TechHTMLPERL.js');

    echo "
<TABLE width='100%' border=0>
<TR class='head'><TD align=middle>
<h4 align='center'>HTML to PERL</h4>
<FORM name=htphp>
  <div align='center'>
    <TABLE cellSpacing=2 cellPadding=2 width=\'100%\' border=0>
      <TR class='even'>
      <TD align=middle>Paste Your Code Below</TD>
      </TR>
    </TABLE>
  </div>
  <TR class='odd'>
  <TD align=middle>
    <div align='center'>
      <TEXTAREA name=input rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
    </div></TD>
  </TR>
  <TR class='even'>
  <TD align=middle><div align='center'>Converted Code Below</div></TD>
  </TR>
  <TR class='odd'>
  <TD align=middle>
    <div align='center'>
      <TEXTAREA name=output rows=15 wrap=VIRTUAL cols=68></TEXTAREA>
    </div></TD>
  </TR>
  <TR class='even'>
  <TD align=middle>
    <div align='center'>
      <INPUT class=button onclick=htmlphp() type=button value='Convert'>
      <INPUT class=button onclick=javascript:this.form.output.focus();this.form.output.select(); type=button value='Select-All' name=button wszystko>
      <INPUT class=button onclick=reset(input.output) type=button value='Clear-Form'>
    </div></TD>
  </TR>
</FORM></TD>
</TR>
</TABLE>";

    include('footer.php');
}

function HTMLEDIT()
{
    global $module_name;

    include 'header.php';

    include('js/Tech.js');

    echo "
<table width='100%'>
<tr class='head'><td><form name='editor'>
  <h3 align='center'>T-Tech Online Editor </h3>
  <div align='center'>
    <table width='100%'  border='1' cellspacing='2' cellpadding='2'>
      <tr class='even'>
        <td>
	      <div align='center'><img onClick='bold()' src='images/b.gif' alt='Bold' width='20' height='20' border='0'>
            <img onClick='italic()' src='images/i.gif' alt='Italic' width='20' height='20' border='0'>
            <img onClick='underline()' src='images/u.gif' alt='Underline' width='20' height='20' border='0'>
            <img onClick='hbar()' src='images/hr.gif' alt='Horizantle Rule' width='20' height='20' border='0'>
            <img onClick='lbreak()' src='images/lbk.gif' alt='Linke Break' width='25' height='20' border='0'>
            <img onClick='pbreak()' src='images/pbk.gif' alt='Paragraph Break' width='25' height='20' border='0'>
            <img onClick='pre()' src='images/pre.gif' alt='Preformatted' width='25' height='20' border='0'>
            <img onClick='head1()' src='images/1.gif' alt='Heading 1' width='20' height='20' border='0'>
            <img onClick='head2()' src='images/2.gif' alt='Heading 2' width='20' height='20' border='0'>
            <img onClick='head3()' src='images/3.gif' alt='Heading 3' width='20' height='20' border='0'>
            <img onClick='head4()' src='images/4.gif' alt='Heading 4' width='20' height='20' border='0'>
            <img onClick='head5()' src='images/5.gif' alt='Heading 5' width='20' height='20' border='0'>	  </div></td>
        <td>
	      <div align='center'><img onClick='image()' src='images/img.gif' alt='Image' width='35' height='20' border='0'>
            <img onClick='aleft()' src='images/left.gif' alt='Image Align Left' width='35' height='20' border='0'>
            <img onClick='aright()' src='images/right.gif' alt='Image Align Right' width='35' height='20' border='0'>
            <img onClick='atop()' src='images/top.gif' alt='Image Align Top' width='35' height='20' border='0'>
            <img onClick='abottom()' src='images/bot.gif' alt='Image Align Bottom' width='35' height='20' border='0'>
            <img onClick='(amid)' src='images/mid.gif' alt='Image Align Middle' width='35' height='20' border='0'>	  </div></td>
        <td>
	      <div align='center'><img onClick='end()' src='images/done.gif' alt='Finished Editing?' width='50' height='20' border='0'>
            <img onClick='preview()' src='images/view.gif' alt='Preview &amp; Save' width='50' height='20' border='0'>
            <img onClick='treset()' src='images/clear.gif' alt='Clear All?' width='50' height='20' border='0'>	  </div></td>
      </tr>
      <tr class='even'>
        <td>
	      <div align='center'><img onClick='linkopen()' src='images/open.gif' alt='Open Link Tag' width='35' height='20' border='0'>
            <img onClick='linktext()' src='images/text.gif' alt='Link Text' width='35' height='20' border='0'>
            <img onClick='linkclose()' src='images/close.gif' alt='Close Link Tag' width='35' height='20' border='0'>
            <img onClick='anchor()' src='images/anch.gif' alt='Anchor Link' width='35' height='20' border='0'>	  </div></td>
        <td>
	      <div align='center'><img onClick='font()' src='images/font.gif' alt='Font  Tag Open' width='35' height='20' border='0'>
            <img onClick='fontcolor()' src='images/color.gif' alt='Font Color' width='35' height='20' border='0'>
            <img onClick='fontsize()' src='images/size.gif' alt='Font Size' width='35' height='20' border='0'>
            <img onClick='fontclose()' src='images/close.gif' alt='Font Tag Close' width='35' height='20' border='0'>	  </div></td>
        <td>
	      <div align='center'>Mode: 
            <input type='radio' name='mode' value='help' onClick='thelp(1)'>
	    Help
        <input type='radio' name='mode' value='prompt' onClick='thelp(2)'>
        Prompt
	    <input type='radio' name='mode' value='basic' checked onClick='thelp(0)'>
        Basic
        </div></td>
      </tr>
      <tr class='even'>
        <td>
	      <div align='center'><img onClick='orderopen()' src='images/open.gif' alt='Ordered List Open' width='35' height='20' border='0'>
            <img onClick='li()' src='images/item.gif' alt='Ordered List Item' width='35' height='20' border='0'>
            <img onClick='orderclose()' src='images/close.gif' alt='Ordered List Close' width='35' height='20' border='0'>	  </div></td>
        <td>
	      <div align='center'><img onClick='unorderopen()' src='images/open.gif' alt='Unordered List Open' width='35' height='20' border='0'>
            <img onClick='li()' src='images/item.gif' alt='Unordered List Item' width='35' height='20' border='0'>
            <img onClick='unorderclose()' src='images/close.gif' alt='Unordered List Close' width='35' height='20' border='0'>	  </div></td>
        <td>
	      <div align='center'><img onClick='defopen()' src='images/open.gif' alt='Definition List Open' width='35' height='20' border='0'>
            <img onClick='defterm()' src='images/term.gif' alt='Definition List Term' width='35' height='20' border='0'>
            <img onClick='define()' src='images/def.gif' alt='Definition List Define' width='35' height='20' border='0'>
            <img onClick='defclose()' src='images/close.gif' alt='Definition List Close' width='35' height='20' border='0'> </div></td>
      <font size='-1'><i>Note: Hold your mouse over a button for help.</i></font>
	  </tr>
    </table>
  </div>
  <p class='odd' align='center'>
<strong>To save:</strong> Click on -View-, then go to -File- &amp; -Save As- in the new window.<BR>
<BR>
<textarea name=area rows=12 cols=90 wrap=physical>
<head>
<online editor by t-tech inc.>
<title>New Page</title>
</head>
</textarea>
<p>
</form>
</td></tr></table>";

    include('footer.php');
}

function Techpop()
{
    global $module_name;

    include 'header.php';

    include('js/Techpopup.js');

    include('js/Tech.js');

    echo "<table><tr class='head'><td>
<center><br><h4>Pop-Up Creator</h4>
</td><tr class='even'>
<td>
<p><strong>Step: 1</strong><br>
<i>Configure the look of the popup window (Be sure to click the &quot;Live Preview&quot; link to instantly see how the window looks)</font></i></p>
<form method='POST' name='winlook'>
<table width='90%' border='0' cellpadding='0' cellspacing='0'>
<tr class='odd'>
<td width='20%' height='20'>
<p align='left'><small>Tool Bar</font></small></td>
<td width='5%' height='20'>
<p align='left'><small><input type='checkbox' name='looks' value='toolbar'></font></small></td>
<td width='20%' height='20'>
<p align='left'><small>Location Bar</font></small></td>
<td width='5%' height='20'>
<p align='left'><small><input type='checkbox' name='locks' value='location'></font></small></td>
<td width='20%' height='20'>
<p align='left'><small>Directory Bar</font></small></td>
<td width='5%' height='20'>
<p align='left'><small><input type='checkbox' name='looks' value='directories'></font></small></td>
<td width='20%' height='20'>
<p align='left'><small>Status Bar</font></small></td>
<td width='5%' height='20'>
<p align='left'><small><input type='checkbox'  name='looks' value='status'></font></small></td>
</tr>
<tr class='odd'>
<td width='20%' height='8'>
<p align='left'><small>Scroll Bar</font></small></td>
<td width='5%' height='8'>
<p align='left'><small><input type='checkbox' name='looks' value='scrollbars'></font></small></td>
<td width='20%' height='8'>
<p align='left'><small>Menu Bar</font></small></td>
<td width='5%' height='8'>
<p align='left'><small><input type='checkbox' name='looks' value='menubar'></font></small></td>
<td width='20%' height='8'>
<p align='left'><small>Resizable</font></small></td>
<td width='5%' height='8'>
<p align='left'><small><input type='checkbox' name='looks' value='resizable'></font></small></td>
<td width='20%' height='8'>
<p align='left'><small><a href='javascript:previewit()'>Click For Live Preview</a></strong></font></small></td>
<td width='5%' height='8'>
<p align='left'></td>
</tr>
</table>
</form>
<form method='POST' name='winsession'>
<table width=100% border=\'0\' cellpadding=\'0\' cellspacing=\'0\'>
<tr class='odd'>
<td>
<p align='left'><strong>Step: 2</strong><br>
  <em>Do you want the popup window to load automatically, or via<br>
  a text link?
  </em>
<td>
<p align='left'><select size='1' name='winsession1'>
<option selected value='auto'>Automatically</option>
<option value='textlink'>Text Link</option>
</select></td>
</tr>
<tr class='odd'>
<td>
<p align='left'><br>
<input type='button' value='Generate' name='B1' onClick='generateit()'> 
<input type='button' value='Clear-Form' name='B2' onClick='document.winlook.reset();document.winsession.reset();document.source.reset()'></td>
<td width='190'>
<p align='left'></td>
</tr>
</table>
</form>
<p><em>Simply copy the generated code into the &lt;BODY&gt; section of your webpage, and you're done!</em></p>
<form method='POST' action='--WEBBOT-SELF--' name='source'>
<!--webbot bot='SaveResults' u-file='C:\\temp\\_private\\form_results.txt' s-format=\'TEXT/CSV\' s-label-fields=\'TRUE\' --><p>
<textarea rows='10' name='source2' cols='80'></textarea></p>
</form>
<p><strong>Further Configuration:</font></strong></p>
<p><em>To change the document contained inside the popup, change the variable &amp;quot;popurl&amp;quot; of function openpopup()&lt;/small&gt;&lt;br&gt;&lt;small&gt;-To alter the width/height of the popup window, change the width and height attributes inside function openpopup()</em></p></table>";

    include('footer.php');
}

function MTags()
{
    global $module_name;

    include 'header.php';

    include('js/TechMTags.js');

    include 'js/Tech.js';

    echo " 
<table><tr class='odd'><td>
<center><h4>Meta Tags Generator</h4></center>
 <b>The author:</b> META tag defines the name of the author of the document being read.<br>
 <b>The expires:</b> META tag defines the expiration date and time of the document being indexed and requires RFC1123 date format, for example: Thu, 04 Oct 2010 14:21:20 GMT.<br>
 <b>The abstract:</b> META tag is a one line sentence which gives an overview of the entire webpage.<br>
 <b>Copyright:</b> no need to add ©, it will be added automatically.<br>
 <b>Designer:</b> Sites designer(s).<br>
 <b>Publisher:</b> Company that publishes material being read or sold on a web site.<br>
 <b>The Revisit:</b> META tag defines how often a search engine or spider should
come to your website for re-indexing. For example: 2 Days, 3 Days, 4 Days, etc.
Note: Just ad number(s), word Days will be added automatically.<br>
  <b>Distribution: </b>Global (indicates that your webpage is intended for
mass distribution to everyone), Local (intended for local distribution
of your document), and IU - Internal Use (not intended for public distribution). <br>
</td></tr></table>         
<table WIDTH='100%' BORDER='0' CELLSPACING='0' CELLPADDING='0'>
<tr class='head'>
<td>
<form>
<div align='center'><br>
  <table  BORDER='0' CELLPADDING='2'>
    <tr class='even'>
    <td>Title:</td>
    <td><input TYPE='text' NAME=input1 SIZE='30'></td>
    </tr>
   <tr class='odd'>
    <td>Author:</td>
    <td><input TYPE='text' NAME=input2 SIZE='30'></td>
    </tr>
    <tr class='even'>
    <td>Subject:</td>
    <td><input TYPE='text' NAME=input3 SIZE='30'></td>
    </tr>
    <tr class='odd'>
    <td>Description:</td>
    <td><input TYPE='text' NAME=input4 SIZE='30'></td>
    </tr>
    <tr class='even'>
    <td>Keywords:</td>
    <td><input TYPE='text' NAME=input5 SIZE='30'></td>
    </tr>
    <tr class='odd'>
    <td>Generator:</td>
    <td><input TYPE='text' NAME=input6 SIZE='30'></td>
    </tr>
    <tr class='even'>
    <td>Language:</td>
    <td><input TYPE='text' NAME=input7 SIZE='30'></td>
    </tr>
    <tr class='odd'>
    <td>Expires:</td>
    <td><input TYPE='text' NAME=input8 SIZE='30'></td>
    </tr>
   <tr class='even'>
    <td>Abstract:</td>
    <td><input TYPE='text' NAME=input9 SIZE='30'></td>
    </tr>
     <tr class='odd'>
    <td>Copyrights:</td>
    <td><input TYPE='text' NAME=input10 SIZE='30'></td>
    </tr>
      <tr class='even'>
    <td>Designer:</td>
    <td><input TYPE='text' NAME=input11 SIZE='30'></td>
    </tr>
    <tr class='odd'>
    <td>Publisher:</td>
    <td><input TYPE='text' NAME=input12 SIZE='30'></td>
    </tr>
    <tr class='even'>
    <td>Revisit-After:</td>
    <td><input TYPE='text' NAME=input13 SIZE='30'></td>
    </tr>
       <tr class='odd'>
    <td>Distribution:</td>
    <td><select NAME=input14 size='1'>
    <option VALUE='' SELECTED>Select</option>
    <option VALUE='Global'>Global</option>
    <option VALUE='Local'>Local</option>
    <option VALUE='IU'>Intern Use</option>
    </select></td>
    <tr class='even'>
    <td>Robots:</td>
    <td><select NAME=input15 size='1'>
    <option VALUE='' SELECTED>Select</option>
    <option VALUE='All'>All</option>
    <option VALUE='None'>None</option>
    <option VALUE='Index'>Index</option>
    <option VALUE='No Index'>No-Index</option>
    <option VALUE='Follow'>Follow</option>
    <option VALUE='No Follow'>No-Follow</option>
    </select></td>
    </tr>
  </table>
</div>
<p align='center'><input TYPE='button' VALUE=Create ONCLICK='create(this.form)'> 
<input TYPE='reset' VALUE=Clear>
<BR><BR><table><tr class='odd'><td>
<b>Instructions:</b><BR>
Simply copy the following lines of code and insert them between the &lt;HEAD&gt; and &lt;/HEAD&gt; tags in your HTML document.<BR><BR>
<textarea WRAP NAME='story' ROWS=15 COLS=70></textarea></td></tr></table>
</p>
</form>
</td>
</table>";

    include('footer.php');
}

function DeDupe()
{
    global $module_name;

    include 'header.php';

    include('js/TechDeDupe.js');

    echo " 
<FORM ACTION='' NAME=form1 ID=form1>
<TABLE BORDER=1 CELLPADDING=5>
<TR class='head'>
<TD>Paste list to be de-duped here<BR>(one value per line)<td>
</tr>
<tr class='even'>
<td align='center'><TEXTAREA NAME=mainlist COLS=60 ROWS=20></TEXTAREA></TD>
</TR>
<TR class='odd'>
<TD align='center'><input type='button' onClick='dedupe_list();' value='De-Dupe List!'></TD></TR>
</TABLE>
</FORM>";

    include('footer.php');
}

switch ($opi) {
    default:
    Tools();
    break;
    case 'HTMLPHP':
    HTMLPHP();
    break;
    case 'HTMLJS':
    HTMLJS();
    break;
    case 'HTMLJSP':
    HTMLJSP();
    break;
    case 'HTMLPERL':
    HTMLPERL();
    break;
    case 'HTMLASP':
    HTMLASP();
    break;
    case 'Techpop':
    Techpop();
    break;
    case 'MTags':
    MTags();
    break;
    case 'HTMLEDIT':
    HTMLEDIT();
    break;
    case 'DeDupe':
    DeDupe();
    break;
}
?>
<?php
require XOOPS_ROOT_PATH . '/footer.php';
?>
