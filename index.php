<!DOCTYPE html>
<!--
        pwGenerator generate rendom passwords

    Copyright (C) 2017  NBprojekt
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
-->
<html>
    <head>
        <title>Password Generator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {margin: 0px;}
            #input {margin-left: 20%;margin-right: 20%;}
            #input form{
                width: 500px;padding-top: 20px;padding-bottom:20px;
                margin-left:auto;margin-right:auto;margin-top:50px; 
                box-shadow: 7px 7px 2px 2px #ccc;border: solid darkgray 1.2px; 
                font-family: "Comic Sans MS", "Times New Roman", "Times, serif";
                font-size:130%;
            }
            #input select, #input input {width: 90%;text-align: center;margin-left: 10px;} 
            input[type='number'] {-moz-appearance:textfield; }
        </style>
    </head>
    <body><?php   if(!isset($_GET['GRA43ERG65HTRHA12FAWE13'])){ ?>
        <div id="input" align="center">
            <form name="in"  
                  action="index.php?GRA43ERG65HTRHA12FAWE13=FAWEF323WEF32ERS3212FAE324GER43G3554245Z54GAER3Q43G34GQQ43RQ34T5Z45QGQ43T3415U67IT78OKT9P" 
                  method="post"><!-- a useless getVar to confuse the user -->
                <table>
                    <tr>
                        <td> Name of the project </td>
                        <td> <input type="text" autocomplete required
                                    name="projectName" autofocus> </td>
                    </tr>
                    <tr>
                        <td> Lenght of the passowrds </td>
                        <td> <input type="number" autocomplete required
                                    name="pwLength" min="20" max="60"> </td>
                    </tr>
                    <tr>
                        <td> Select the color of YOUR password </td>
                        <td> 
                            <select name="projectColor" size="1">
                                <option value="0"> Red          </option>
                                <option value="1"> Gold         </option>
                                <option value="2"> Green        </option>
                                <option value="3"> Blue         </option>
                                <option value="4"> Orange       </option>
                                <option value="5"> Lawngreen    </option>
                                <option value="6"> Grey         </option>
                                <option value="7" selected> Pink</option>
                                <option value="8"> Purple       </option>
                                <option value="9"> Brown        </option>
                            </select>
                        </td>
                    </tr>
                    <tr> 
                        <td colspan="2"> <input type="submit" value="Generate passwordlist" style="margin-top:10px;"> </td>
                    </tr>
                </table>
            </form>
        </div> <?php } else { 
                    // variables declaration  
               $colorList = array("red","gold","green","blue","orange","lawngreen","grey","pink","purple","brown",);
               $string = "0123456789abcdefghijklmnopqrstuvwxzABCDEFGHJIKLMNOPQRSTUVWXYZ#$&?.";
               $pn = $_POST['projectName'];$len = $_POST['pwLength'];
               $pc = $colorList[$_POST['projectColor']];$passwords = array();
               $value = '<title>'.$pn.'</title>'; 
                    // Generate pw
               shuffle($colorList);
               for ( $i = 0; $i < 10; $i++ ){
                    $passwords[$i] = "";
                    for ( $j = 0; $j < $len ; $j++ ) { 
                        $random = rand(0, 65);$passwords[$i] = $passwords[$i].substr($string, $random, 1); 
                    }       
                }    
                    // Styles for the output
               $value = $value.'<style> #retry { margin:auto; text-align:center; margin-top:15px;';
               $value = $value.'             width:700px;padding:8px; ';
               $value = $value.'         }';
               $value = $value.'         .output{';
               $value = $value.'             margin:auto; text-align:center; margin-top:15px;';
               $value = $value.'             box-shadow: 7px 7px 2px 2px #ccc;border: solid darkgray 1.2px; ';
               $value = $value.'             width:700px;padding:8px; ';
               $value = $value.'            font-family: "Times, serif";';
               $value = $value.'             font-size:130%;';
               $value = $value.'         }  ';
               $value = $value.'         h2 { font-style: italic;font-size:200%;}';
               $value = $value.'         .hr { color:grey;margin-left:10px;margin-right:10px;}';
               $value = $value.'         u { text-decoration: none;} ';
               $value = $value.'       </style>'; 
                    // Output div
               $value = $value.'<div class="output"> <h2>'.$pn.'</h2> <hr class="hr"><br><p>';
                       for ($i=0;$i<10;$i++){
                           $value = $value.'<u style="color:'.$colorList[$i].';"> '.$passwords[$i].'</u><br>'; 
                       }
               $value = $value.'</p></div> ';
                    // Cutline 
               $value = $value.'<div style="width:600px; margin:auto;margin-top:10px;margin-bottom:10px;">';
               $value = $value.'        <div style="float:left;width:100%;"><hr></div>';
               $value = $value.'       </div>';
                    // Hint
               $value = $value.'<div class="output" style="margin-top:35px">';
               $value = $value.'         Don`t forget your password color is <strong style="color:'.$pc.';">'.$pc.'</strong>';
               $value = $value.'       </div>';
               print $value;   
               // Retry and print div
               ?>
                <div id="retry">
                    <form method="post" action="print.php" >
                      <input type="submit" value="Try new" name="reload">
                      <input type="submit" value="Create jpeg" name="jpgCreate">
                      <input type="hidden" value='<?php echo $value; ?>' name="htmCode">
                    </form>
                </div>';
            <?php } ?>
    </body> 
</html>
