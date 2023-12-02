<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionWisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('section_wises')->delete();
        
        \DB::table('section_wises')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Section wise student list',
                'title_bn' => 'শ্রেণী ভিত্তিক অনুমোদিত শাখার তথ্য',
                'details' => '<table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" style="border: none;">
<tbody><tr>
<td width="156" valign="top" style="width: 116.85pt; border-width: 1pt; border-color: windowtext; border-image: initial; background: rgb(222, 234, 246); padding: 0in 5.4pt;">
<p class="MsoNormal" align="right" style="margin-bottom:0in;text-align:right;
line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.85pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-image: initial; border-left: none; background: rgb(217, 226, 243); padding: 0in 5.4pt;">
<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-image: initial; border-left: none; background: rgb(217, 226, 243); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-image: initial; border-left: none; background: rgb(217, 226, 243); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
<tr>
<td width="156" valign="top" style="width: 116.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-image: initial; border-top: none; background: rgb(213, 220, 228); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.85pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(189, 214, 238); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(172, 185, 202); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(142, 170, 219); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
<tr>
<td width="156" valign="top" style="width: 116.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-image: initial; border-top: none; background: rgb(213, 220, 228); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.85pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(189, 214, 238); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(172, 185, 202); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(142, 170, 219); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
<tr>
<td width="156" valign="top" style="width: 116.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-image: initial; border-top: none; background: rgb(213, 220, 228); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.85pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(189, 214, 238); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(172, 185, 202); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(142, 170, 219); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
<tr>
<td width="156" valign="top" style="width: 116.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-image: initial; border-top: none; background: rgb(213, 220, 228); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.85pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(189, 214, 238); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(172, 185, 202); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
<td width="156" valign="top" style="width: 116.9pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: windowtext; border-right-width: 1pt; border-right-color: windowtext; background: rgb(142, 170, 219); padding: 0in 5.4pt;">
<p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
</tbody></table>

<p class="MsoNormal"><o:p>&nbsp;</o:p></p>',
                'image' => '0',
                'created_at' => NULL,
                'updated_at' => '2023-09-20 05:36:09',
            ),
        ));
        
        
    }
}