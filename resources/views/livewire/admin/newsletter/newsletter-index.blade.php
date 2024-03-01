<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>

    /* @media screen and (max-width:700px) {
        p.h1{
            font-size: 30px !important;
        }

        .imperial{
            padding:0 5px 5px 5px !important
        }
        .header-title{
            padding:10px 0 10px 0 !important;
            text-align: center;
        }
        .img-center{
            text-align: center !important;
        }
        .responsiveWith,
        .row-content {
            width: 100% !important;
        }

        .image_block img.big {
            width: auto !important;
        }

        .stack .column {
            width: 100%;
            display: block;
        }

        .center_thing{
            text-align: center !important;
        }

        .text_block.nospace td{
            padding: 0px !important;
        }
        .text_block.nospace td p{
            height: 0px !important;
        }

        .min-height-auto{
            min-height: auto !important;
        }
        .strategie-content{
            padding:5px 15px;
        }
        .btn_link{
            text-align: center;
        }
    } */

    @media screen and (min-width:700px) {
    p.h1{
        font-size: 38px !important;
    }
    .first{
        padding:20px 5px 5px 5px
    }
    .second{
        padding:44px 5px 5px 5px
    }
    .third{
        padding:20px 5px 5px 5px
    }
    }
    @media screen and (max-width:700px) {
    p.h1{
        font-size: 30px !important;
    }
    /* .responsiveWith,
        .row-content {
            width: 100% !important;
        } */
    }
    .test{
        position: relative;
    }

    </style>
</head>
<body>
    <div class="wrapper" style="width: 100%;table-layout: fixed;">
        <div class="wrapper-inner" style="width: 700px;background-color: #fff;max-width: 100%;margin: 0 auto;">
            <table class="outer-table" style="width: 700px;max-width: 100%;margin: 0 auto;background-color: #fff;">
    			<tr>
    				<td class="header" style="color: #555;padding: 0;">
    					<p style="margin: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;text-align: center;padding: 1%;font-weight: 500;">Pour visualiser correctement ce message,<a href="[SHOWEMAIL]" target="_blank" style="color: #0068A5;text-decoration: none;">cliquer ici</a></p>
    				</td>
    			</tr> <!--- End Header -->
            </table> <!--- End Outer Table -->
            <table class="outer-table" style="border-spacing: 0;font-family: sans-serif;width: 700px;max-width: 100%;margin: 0 auto;background-color: #FFF;">
                <tr align="center">
                    <td class="image" style="padding: 0;">
                        <a href="#" style="background-color:#fff" target="_blank">
                            <img src="{{ asset('images/image-6.png') }}" alt="" style="border: 0;width: 200px;max-width: 100%;height: auto;">
                        </a>
                    </td>
                </tr>
            </table><!-- End Of Logo Image -->
            <!--@if ($firstBanner)-->
            <table class="outer-table" style="border-spacing: 0;font-family: sans-serif;width: 700px;max-width: 100%;margin: 0 auto;background-color: #FFF;">
                <tr>
                    <td class="image" style="padding: 0;">
                        <a href="{{ $firstBanner->lien }}" style="background-color:#fff" target="_blank">
                            <img src="https://admanager.goal.ma{{ $firstBanner->image }}" alt="" style="border: 0;width: 700px;max-width: 100%;height: auto;">
                        </a>
                    </td>
                </tr>
            </table><!-- End Of Banner Image -->
            <!--@endif-->

            <table class="main-table" style="border-spacing: 0;font-family: sans-serif;color: hsla(200,0%,0%,.7);width: 100%;margin: 0 auto;background-color: #fff;border-radius: 6px;">


                @forelse ($firstArticles as $article)
                <tr>
                    <table align="center" class="row-content stack"  border="0" width="680" style=" box-sizing: border-box; color: #000000;margin:15px 0" cellspacing="0" cellpadding="0">
											<tbody style="box-sizing: border-box;">
												<tr style="box-sizing: border-box;">
                                                <th align="left" valign="middle" class="column" width="35%" style="text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: middle;">
                                                    <table border="0" width="100%" style="box-sizing: border-box;" cellspacing="0" cellpadding="0">
                                                        <tbody style="box-sizing: border-box;">
                                                            <tr style="box-sizing: border-box;">
                                                                <td style="width: 100%; box-sizing: border-box;">
                                                                    <div align="center" class="test" style="box-sizing: border-box; line-height: 10px; margin-right: 10px;">
                                                
                                                                            <a href='https://goal.ma/{{ $article->category->name }}' target="_blank" style="text-decoration:none;color:#FFF;float: right; width: 60px; height: 20px;line-height:20px; background-color: {{ $article->category->color }}; padding: 5px; font-size: 13px; color: #fff;display:inline-block;">{{ $article->category->name }}</a>
                                                
                                                                        <a href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" target="_blank" style="display: block;">
                                                                            <img class="responsiveWith big" src="https://goal.ma{{ $article->image }}" width="240" style="border: 0; width: 100%; height: auto; display: block; max-width: 100%;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </th>

                                                    <th align="left" valign="top" class="column" width="65%" style=" text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: top; ">

														<table class="heading_block"  border="0" width="100%" style=" box-sizing: border-box; " cellspacing="0" cellpadding="0">
															<tbody style="box-sizing: border-box;">
                                            <tr>
                                                <td style="padding: 10px;" class="header-title">
                                                    <a href="#" target="_blank" style="text-decoration: none;line-height:1.3;">
                                                        <span style="font-size: 20px;color: #000;font-family:Arial, Helvetica, sans-serif" class="heading-2">
                                                            <strong>{{ $article->title }}</strong>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
															</tbody>
														</table>
														<table class="text_block"  border="0" width="100%" style=" box-sizing: border-box; word-break: break-word; " cellspacing="0" cellpadding="10">
															<tbody style="box-sizing: border-box;">
																<tr style="box-sizing: border-box;">
																	<td style="box-sizing: border-box;padding-top: 0px;" >
																		<div style="box-sizing: border-box; font-family: Arial, sans-serif;">
																			<div style="box-sizing: border-box; font-size: 14px; color: #727272; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; line-height: 1.5; ">
																				<p align="justify" style="margin: 0; text-align: justify; box-sizing: border-box; font-size: 12px; line-height: 27px;" class="strategie-content">
                                                                                    {{ Illuminate\Support\Str::words($article->excerpt, 40, '...') }}
                                                                                </p>
																			</div>
																		</div>
																	</td>
																</tr>
                                                                <tr class="btn_link" align="right">
                                                                    <td class="m_description" style="padding:0px">
                                                                        <div class="m_button-holder" style="margin-left:10px">
                                                                            <a class="m_btn" href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" style="color:#FFF;background-color:#06a49c;text-align:center;word-break:keep-all;display:inline-block;padding:5px 10px;box-sizing:border-box;border-radius:25px;font-weight:400;font-family:Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #06a49c;width:auto;text-decoration: none;" target="_blank" rel="noreferrer">
                                                                                <span class="m_btn-text">
                                                                                    <strong>Lire la suite</strong>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
															</tbody>
														</table>
													</th>
												</tr>
											</tbody>
										</table>
                </tr>
                @empty
                    
                @endforelse
            </table>
            @if ($secondBanner)
            <table class="outer-table" style="border-spacing: 0;font-family: sans-serif;width: 700px;max-width: 100%;margin: 0 auto;background-color: #FFF;">
                <tr>
                    <td class="image" style="padding: 0;">
                        <a href="{{ $secondBanner->lien }}" style="background-color:#fff" target="_blank">
                            <img src="https://admanager.goal.ma{{ $secondBanner->image }}" alt="" style="border: 0;width: 700px;max-width: 100%;height: auto;">
                        </a>
                    </td>
                </tr>
            </table><!-- End Of Banner Image -->
            @endif

            <table class="main-table" style="border-spacing: 0;font-family: sans-serif;color: hsla(200,0%,0%,.7);width: 100%;margin: 0 auto;background-color: #fff;border-radius: 6px;">
                @forelse ($secondArticles as $article)
                <tr>
                    <table align="center" class="row-content stack"  border="0" width="680" style=" box-sizing: border-box; color: #000000;margin:15px 0" cellspacing="0" cellpadding="0">
											<tbody style="box-sizing: border-box;">
												<tr style="box-sizing: border-box;">
                                                <th align="left" valign="middle" class="column" width="35%" style="text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: middle;">
                                                    <table border="0" width="100%" style="box-sizing: border-box;" cellspacing="0" cellpadding="0">
                                                        <tbody style="box-sizing: border-box;">
                                                            <tr style="box-sizing: border-box;">
                                                                <td style="width: 100%; box-sizing: border-box;">
                                                                    <div align="center" class="test" style="box-sizing: border-box; line-height: 10px; margin-right: 10px;">
                                                
                                                                            <a href='https://goal.ma/{{ $article->category->name }}' target="_blank" style="text-decoration:none;color:#FFF;float: right; width: 60px; height: 20px;line-height:20px; background-color: {{ $article->category->color }}; padding: 5px; font-size: 13px; color: #fff;display:inline-block;">{{ $article->category->name }}</a>
                                                
                                                                        <a href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" target="_blank" style="display: block;">
                                                                            <img class="responsiveWith big" src="https://goal.ma{{ $article->image }}" width="240" style="border: 0; width: 100%; height: auto; display: block; max-width: 100%;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </th>

                                                    <th align="left" valign="top" class="column" width="65%" style=" text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: top; ">

														<table class="heading_block"  border="0" width="100%" style=" box-sizing: border-box; " cellspacing="0" cellpadding="0">
															<tbody style="box-sizing: border-box;">
                                            <tr>
                                                <td style="padding: 10px;" class="header-title">
                                                    <a href="#" target="_blank" style="text-decoration: none;line-height:1.3;">
                                                        <span style="font-size: 20px;color: #000;font-family:Arial, Helvetica, sans-serif" class="heading-2">
                                                            <strong>{{ $article->title }}</strong>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
															</tbody>
														</table>
														<table class="text_block"  border="0" width="100%" style=" box-sizing: border-box; word-break: break-word; " cellspacing="0" cellpadding="10">
															<tbody style="box-sizing: border-box;">
																<tr style="box-sizing: border-box;">
																	<td style="box-sizing: border-box;padding-top: 0px;" >
																		<div style="box-sizing: border-box; font-family: Arial, sans-serif;">
																			<div style="box-sizing: border-box; font-size: 14px; color: #727272; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; line-height: 1.5; ">
																				<p align="justify" style="margin: 0; text-align: justify; box-sizing: border-box; font-size: 12px; line-height: 27px;" class="strategie-content">
                                                                                    {{ Illuminate\Support\Str::words($article->excerpt, 40, '...') }}
                                                                                </p>
																			</div>
																		</div>
																	</td>
																</tr>
                                                                <tr class="btn_link" align="right">
                                                                    <td class="m_description" style="padding:0px">
                                                                        <div class="m_button-holder" style="margin-left:10px">
                                                                            <a class="m_btn" href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" style="color:#FFF;background-color:#06a49c;text-align:center;word-break:keep-all;display:inline-block;padding:5px 10px;box-sizing:border-box;border-radius:25px;font-weight:400;font-family:Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #06a49c;width:auto;text-decoration: none;" target="_blank" rel="noreferrer">
                                                                                <span class="m_btn-text">
                                                                                    <strong>Lire la suite</strong>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
															</tbody>
														</table>
													</th>
												</tr>
											</tbody>
										</table>
                </tr>
                @empty
                    
                @endforelse
            </table>
            @if ($thirdBanner)
            <table class="outer-table" style="border-spacing: 0;font-family: sans-serif;width: 700px;max-width: 100%;margin: 0 auto;background-color: #FFF;">
                <tr>
                    <td class="image" style="padding: 0;">
                        <a href="{{ $thirdBanner->lien }}" style="background-color:#fff" target="_blank">
                            <img src="https://admanager.goal.ma{{ $thirdBanner->image }}" alt="" style="border: 0;width: 700px;max-width: 100%;height: auto;">
                        </a>
                    </td>
                </tr>
            </table><!-- End Of Banner Image -->
            @endif

            <table class="main-table" style="border-spacing: 0;font-family: sans-serif;color: hsla(200,0%,0%,.7);width: 100%;margin: 0 auto;background-color: #fff;border-radius: 6px;">
                @forelse ($thirdArticles as $article)
                <tr>
                    <table align="center" class="row-content stack"  border="0" width="680" style=" box-sizing: border-box; color: #000000;margin:15px 0" cellspacing="0" cellpadding="0">
											<tbody style="box-sizing: border-box;">
												<tr style="box-sizing: border-box;">
                                                <th align="left" valign="middle" class="column" width="35%" style="text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: middle;">
                                                    <table border="0" width="100%" style="box-sizing: border-box;" cellspacing="0" cellpadding="0">
                                                        <tbody style="box-sizing: border-box;">
                                                            <tr style="box-sizing: border-box;">
                                                                <td style="width: 100%; box-sizing: border-box;">
                                                                    <div align="center" class="test" style="box-sizing: border-box; line-height: 10px; margin-right: 10px;">
                                                
                                                                            <a href='https://goal.ma/{{ $article->category->name }}' target="_blank" style="text-decoration:none;color:#FFF;float: right; width: 60px; height: 20px;line-height:20px; background-color: {{ $article->category->color }}; padding: 5px; font-size: 13px; color: #fff;display:inline-block;">{{ $article->category->name }}</a>
                                                
                                                                        <a href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" target="_blank" style="display: block;">
                                                                            <img class="responsiveWith big" src="https://goal.ma{{ $article->image }}" width="240" style="border: 0; width: 100%; height: auto; display: block; max-width: 100%;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </th>

                                                    <th align="left" valign="top" class="column" width="65%" style=" text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: top; ">

														<table class="heading_block"  border="0" width="100%" style=" box-sizing: border-box; " cellspacing="0" cellpadding="0">
															<tbody style="box-sizing: border-box;">
                                            <tr>
                                                <td style="padding: 10px;" class="header-title">
                                                    <a href="#" target="_blank" style="text-decoration: none;line-height:1.3;">
                                                        <span style="font-size: 20px;color: #000;font-family:Arial, Helvetica, sans-serif" class="heading-2">
                                                            <strong>{{ $article->title }}</strong>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
															</tbody>
														</table>
														<table class="text_block"  border="0" width="100%" style=" box-sizing: border-box; word-break: break-word; " cellspacing="0" cellpadding="10">
															<tbody style="box-sizing: border-box;">
																<tr style="box-sizing: border-box;">
																	<td style="box-sizing: border-box;padding-top: 0px;" >
																		<div style="box-sizing: border-box; font-family: Arial, sans-serif;">
																			<div style="box-sizing: border-box; font-size: 14px; color: #727272; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; line-height: 1.5; ">
																				<p align="justify" style="margin: 0; text-align: justify; box-sizing: border-box; font-size: 12px; line-height: 27px;" class="strategie-content">
                                                                                    {{ Illuminate\Support\Str::words($article->excerpt, 40, '...') }}
                                                                                </p>
																			</div>
																		</div>
																	</td>
																</tr>
                                                                <tr class="btn_link" align="right">
                                                                    <td class="m_description" style="padding:0px">
                                                                        <div class="m_button-holder" style="margin-left:10px">
                                                                            <a class="m_btn" href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" style="color:#FFF;background-color:#06a49c;text-align:center;word-break:keep-all;display:inline-block;padding:5px 10px;box-sizing:border-box;border-radius:25px;font-weight:400;font-family:Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #06a49c;width:auto;text-decoration: none;" target="_blank" rel="noreferrer">
                                                                                <span class="m_btn-text">
                                                                                    <strong>Lire la suite</strong>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
															</tbody>
														</table>
													</th>
												</tr>
											</tbody>
										</table>
                </tr>
                @empty
                    
                @endforelse
            </table>
            @if ($fourthBanner)
            <table class="outer-table" style="border-spacing: 0;font-family: sans-serif;width: 700px;max-width: 100%;margin: 0 auto;background-color: #FFF;">
                <tr>
                    <tr>
                        <td class="image" style="padding: 0;">
                            <a href="{{ $fourthBanner->lien }}" style="background-color:#fff" target="_blank">
                                <img src="https://admanager.goal.ma{{ $fourthBanner->image }}" alt="" style="border: 0;width: 700px;max-width: 100%;height: auto;">
                            </a>
                        </td>
                    </tr>
                </tr>
            </table><!-- End Of Banner Image -->
            @endif

            <table class="main-table" style="border-spacing: 0;font-family: sans-serif;color: hsla(200,0%,0%,.7);width: 100%;margin: 0 auto;background-color: #fff;border-radius: 6px;">
                @forelse ($fourthArticles as $article)
                <tr>
                    <table align="center" class="row-content stack"  border="0" width="680" style=" box-sizing: border-box; color: #000000;margin:15px 0" cellspacing="0" cellpadding="0">
											<tbody style="box-sizing: border-box;">
												<tr style="box-sizing: border-box;">
                                                <th align="left" valign="middle" class="column" width="35%" style="text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: middle;">
                                                    <table border="0" width="100%" style="box-sizing: border-box;" cellspacing="0" cellpadding="0">
                                                        <tbody style="box-sizing: border-box;">
                                                            <tr style="box-sizing: border-box;">
                                                                <td style="width: 100%; box-sizing: border-box;">
                                                                    <div align="center" class="test" style="box-sizing: border-box; line-height: 10px; margin-right: 10px;">
                                                
                                                                            <a href='https://goal.ma/{{ $article->category->name }}' target="_blank" style="text-decoration:none;color:#FFF;float: right; width: 60px; height: 20px;line-height:20px; background-color: {{ $article->category->color }}; padding: 5px; font-size: 13px; color: #fff;display:inline-block;">{{ $article->category->name }}</a>
                                                
                                                                        <a href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" target="_blank" style="display: block;">
                                                                            <img class="responsiveWith big" src="https://goal.ma{{ $article->image }}" width="240" style="border: 0; width: 100%; height: auto; display: block; max-width: 100%;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </th>

                                                    <th align="left" valign="top" class="column" width="65%" style=" text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: top; ">

														<table class="heading_block"  border="0" width="100%" style=" box-sizing: border-box; " cellspacing="0" cellpadding="0">
															<tbody style="box-sizing: border-box;">
                                            <tr>
                                                <td style="padding: 10px;" class="header-title">
                                                    <a href="#" target="_blank" style="text-decoration: none;line-height:1.3;">
                                                        <span style="font-size: 20px;color: #000;font-family:Arial, Helvetica, sans-serif" class="heading-2">
                                                            <strong>{{ $article->title }}</strong>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
															</tbody>
														</table>
														<table class="text_block"  border="0" width="100%" style=" box-sizing: border-box; word-break: break-word; " cellspacing="0" cellpadding="10">
															<tbody style="box-sizing: border-box;">
																<tr style="box-sizing: border-box;">
																	<td style="box-sizing: border-box;padding-top: 0px;" >
																		<div style="box-sizing: border-box; font-family: Arial, sans-serif;">
																			<div style="box-sizing: border-box; font-size: 14px; color: #727272; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; line-height: 1.5; ">
																				<p align="justify" style="margin: 0; text-align: justify; box-sizing: border-box; font-size: 12px; line-height: 27px;" class="strategie-content">
                                                                                    {{ Illuminate\Support\Str::words($article->excerpt, 40, '...') }}
                                                                                </p>
																			</div>
																		</div>
																	</td>
																</tr>
                                                                <tr class="btn_link" align="right">
                                                                    <td class="m_description" style="padding:0px">
                                                                        <div class="m_button-holder" style="margin-left:10px">
                                                                            <a class="m_btn" href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" style="color:#FFF;background-color:#06a49c;text-align:center;word-break:keep-all;display:inline-block;padding:5px 10px;box-sizing:border-box;border-radius:25px;font-weight:400;font-family:Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #06a49c;width:auto;text-decoration: none;" target="_blank" rel="noreferrer">
                                                                                <span class="m_btn-text">
                                                                                    <strong>Lire la suite</strong>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
															</tbody>
														</table>
													</th>
												</tr>
											</tbody>
										</table>
                </tr>
                @empty
                    
                @endforelse
            </table>
            @if ($fifthBanner)
            <table class="outer-table" style="border-spacing: 0;font-family: sans-serif;width: 700px;max-width: 100%;margin: 0 auto;background-color: #FFF;">
                <tr>
                    <td class="image" style="padding: 0;">
                        <a href="{{ $fifthBanner->lien }}" style="background-color:#fff" target="_blank">
                            <img src="https://admanager.goal.ma{{ $fifthBanner->image }}" alt="" style="border: 0;width: 700px;max-width: 100%;height: auto;">
                        </a>
                    </td>
                </tr>
            </table><!-- End Of Banner Image -->
            @endif

            <table class="main-table" style="border-spacing: 0;font-family: sans-serif;color: hsla(200,0%,0%,.7);width: 100%;margin: 0 auto;background-color: #fff;border-radius: 6px;">
                @forelse ($fifthArticles as $article)
                <tr>
                    <table align="center" class="row-content stack"  border="0" width="680" style=" box-sizing: border-box; color: #000000;margin:15px 0" cellspacing="0" cellpadding="0">
											<tbody style="box-sizing: border-box;">
												<tr style="box-sizing: border-box;">
                                                <th align="left" valign="middle" class="column" width="35%" style="text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: middle;">
                                                    <table border="0" width="100%" style="box-sizing: border-box;" cellspacing="0" cellpadding="0">
                                                        <tbody style="box-sizing: border-box;">
                                                            <tr style="box-sizing: border-box;">
                                                                <td style="width: 100%; box-sizing: border-box;">
                                                                    <div align="center" class="test" style="box-sizing: border-box; line-height: 10px; margin-right: 10px;">
                                                
                                                                            <a href='https://goal.ma/{{ $article->category->name }}' target="_blank" style="text-decoration:none;color:#FFF;float: right; width: 60px; height: 20px;line-height:20px; background-color: {{ $article->category->color }}; padding: 5px; font-size: 13px; color: #fff;display:inline-block;">{{ $article->category->name }}</a>
                                                
                                                                        <a href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" target="_blank" style="display: block;">
                                                                            <img class="responsiveWith big" src="https://goal.ma{{ $article->image }}" width="240" style="border: 0; width: 100%; height: auto; display: block; max-width: 100%;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </th>

                                                    <th align="left" valign="top" class="column" width="65%" style=" text-align: left; border: 0px; box-sizing: border-box; padding: 0; font-weight: 400; vertical-align: top; ">

														<table class="heading_block"  border="0" width="100%" style=" box-sizing: border-box; " cellspacing="0" cellpadding="0">
															<tbody style="box-sizing: border-box;">
                                            <tr>
                                                <td style="padding: 10px;" class="header-title">
                                                    <a href="#" target="_blank" style="text-decoration: none;line-height:1.3;">
                                                        <span style="font-size: 20px;color: #000;font-family:Arial, Helvetica, sans-serif" class="heading-2">
                                                            <strong>{{ $article->title }}</strong>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
															</tbody>
														</table>
														<table class="text_block"  border="0" width="100%" style=" box-sizing: border-box; word-break: break-word; " cellspacing="0" cellpadding="10">
															<tbody style="box-sizing: border-box;">
																<tr style="box-sizing: border-box;">
																	<td style="box-sizing: border-box;padding-top: 0px;" >
																		<div style="box-sizing: border-box; font-family: Arial, sans-serif;">
																			<div style="box-sizing: border-box; font-size: 14px; color: #727272; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; line-height: 1.5; ">
																				<p align="justify" style="margin: 0; text-align: justify; box-sizing: border-box; font-size: 12px; line-height: 27px;" class="strategie-content">
                                                                                    {{ Illuminate\Support\Str::words($article->excerpt, 40, '...') }}
                                                                                </p>
																			</div>
																		</div>
																	</td>
																</tr>
                                                                <tr class="btn_link" align="right">
                                                                    <td class="m_description" style="padding:0px">
                                                                        <div class="m_button-holder" style="margin-left:10px">
                                                                            <a class="m_btn" href="https://goal.ma/sport/{{ $article->category->name }}/{{ $article->slug }}" style="color:#FFF;background-color:#06a49c;text-align:center;word-break:keep-all;display:inline-block;padding:5px 10px;box-sizing:border-box;border-radius:25px;font-weight:400;font-family:Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #06a49c;width:auto;text-decoration: none;" target="_blank" rel="noreferrer">
                                                                                <span class="m_btn-text">
                                                                                    <strong>Lire la suite</strong>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
															</tbody>
														</table>
													</th>
												</tr>
											</tbody>
										</table>
                </tr>
                @empty
                    
                @endforelse
            </table>
            <table style="background-color:#fff;border-collapse:collapse;border-spacing:0;width:100%;width:700px;max-width:100%;margin-left:auto;margin-right:auto">
                <tbody>
                <tr>
                    <td><table  style="max-width:100%;background-color:#06a49c;color:rgba(241,241,241,0.945);padding:10px 0px;width:700px;max-width:100%" align="center" border="0" cellspacing="0" cellpadding="0"> <tbody> <tr> <td align="center"> <br><div style="font-family:arial,sans-serif;font-size:12px;line-height:18px;color:#fff;text-align:center">Pour vous assurer de recevoir nos e-mails, il vous suffit d’ajouter notre adresse<br> e-mail <strong style="color:#fff"><a href="mailto:info@e.information-new.ma" target="_blank">info@goal-news.ma</a></strong> à votre liste d’expéditeurs autorisés<br><br></div></td> </tr> </tbody> </table>
                    </td>
                </tr>
                <tr style="border-collapse:collapse">
                    <td style="padding:0;Margin:0;background-color:transparent" bgcolor="transparent" align="left">
                    <table cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;margin:10px 0;width:700px;max-width:100%">
                    <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:700px">
                        <table cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:700px;max-width:100%">
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0">
                            <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                            <tr style="border-collapse:collapse">
                                <td valign="top" align="center" style="padding-right:5px;margin:0;">
                                    <a href="#">
                                        <img title="Facebook" src="{{ asset('storage/facebook.png') }}" alt="Fb" width="22" style="background-color:#06a49c;border-radius:50%;padding:5px;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                                    </a>
                                </td>
                                <td valign="top" align="center" style="padding-right:5px;margin:0;">
                                    <a href="#">
                                        <img title="Twitter" src="{{ asset('storage/twitter.png') }}" alt="Tw" width="22" style="background-color:#06a49c;border-radius:50%;padding:5px;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                                    </a>
                                </td>
                                <td valign="top" align="center" style="padding-right:5px;margin:0;">
                                    <a href="#">
                                        <img title="Instagram" src="{{ asset('storage/instagram.png') }}" alt="Inst" width="22" style="background-color:#06a49c;border-radius:50%;padding:5px;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                                    </a>
                                </td>
                                <td valign="top" align="center" style="padding-right:5px;margin:0;">
                                    <a href="#">
                                        <img title="Youtube" src="{{ asset('storage/youtube.png') }}" alt="Yt" width="22" style="background-color:#06a49c;border-radius:50%;padding:5px;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                    </a>
                                </td>
                            </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                    </table></td>
                </tr>
            
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

{{-- <div class="wrapper" style="width: 100%;table-layout: fixed;margin-top:20px">

    <div class="wrapper-inner" style="width: 700px;;max-width: 100%;margin: 0 auto;">
    <table class="main-table-first" style="border-spacing: 0;font-family: sans-serif;width: 100%;max-width: 700px;margin: 0 auto;background-color: #fff;border-radius: 6px;">
    <button id="copyBtn" class="copyBtn p-2 rounded text-white bg-main-color">Copier code source</button>
    </table>
</div>
</div>
<script>
    var codeToCopy = document.getElementById("newsletter-content").outerHTML; // Replace "codeToCopy" with the ID of the element containing the code you want to copy
    
    document.getElementById("copyBtn").addEventListener("click", function() {
        navigator.clipboard.writeText(codeToCopy).then(function() {
            console.log("Code copied to clipboard");
        }, function() {
            console.log("Error copying code to clipboard");
        });
    });
    
</script> --}}