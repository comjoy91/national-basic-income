<?php
//	session_start(); 
//	$_SESSION['budget_init'] = 0;
//	$_SESSION['expense_chapter_1'] = 0;
//	$_SESSION['expense_chapter_2'] = 0;
//	$_SESSION['expense_chapter_3'] = 0;
//	$_SESSION['expense_chapter_4'] = 0;
?>


<?php
//	require_once('php/indexFunction.php');
//	require_once('php/scrollspy-left.php');
//	require_once('php/survey-right.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>LAB2050 국민기본소득제</title>

	<!--
		<meta name="description" content="갓난아이가 자라 성인이 될 때까지 부모는 얼마를 부담해야 할까요? 아이를 낳으면 행복감도 들지만 경제적 부담을 지어야 하는 것도 사실입니다. 아이 키우기는 선택의 연속! 이 사이트는 ‘요람에서 대학까지’ 각 단계별로 부모 선택에 따라 양육비가 총 얼마 드는지 계산해드립니다." />
		
		<meta property="og:type" content="website" />
		<meta property="og:title" content="요람부터 대학까지: 2019 대한민국 양육비 계산기" />
		<meta property="og:description" content="갓난아이가 자라 성인이 될 때까지 부모는 얼마를 부담해야 할까요? 아이 키우기는 선택의 연속! ‘요람에서 대학까지’ 각 단계별로 부모 선택에 따라 양육비가 총 얼마 드는지 계산해드립니다." />
		<meta property="og:image" content="http://baby.donga.com/2019-10-10-born-and-raise-receipt/01_receipt/%40asset/img/0-0_thumbnail.png" />
		<meta property="og:image:alt" content="2019 대한민국 양육비 계산기의 첫 페이지 화면 이미지" />
		<meta property="og:locale" content="ko_KR" />
		<meta property="og:site_name" content="동아일보Dong-A Ilbo" />
		<meta property="og:url" content="http://baby.donga.com/2019-10-10-born-and-raise-receipt/01_receipt/index.php" />
		<meta name="twitter:card" content="summary_large_image" />
-->


	<!--
		<link rel="icon" type="image/png" sizes="32x32" href="@asset/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="@asset/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="@asset/favicon/favicon-16x16.png">
-->

	<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+KR:400,700&display=swap&subset=korean,latin-ext" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap 3: Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<!-- Bootstrap 3: Optional theme -->
	<!--		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">-->
	<!-- Bootstrap 3: Latest compiled and minified JavaScript -->
	<!--		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>-->
	

	<!-- clipboard.js plugin -->
	<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body class="chapter_0_body container">

		<div class="form-horizontal" id="form-member-income">
			<div class="form-head row">
				<div class="col-sm-offset-1 col-sm-1">구성원</div>
				<div class="col-sm-2">연령대</div>
				<div class="col-sm-2">근로/사업/금융소득</div>
				<div class="col-sm-offset-1 col-sm-2">기초연금/아동수당</div>
			</div>
			
			<div class="form-body">
				<div class="form-group row" id="form-member-0">
					<div class="col-sm-1"></div>
					<label class="col-sm-1 control-label">본인</label>
					<div class="col-sm-2 form-inline div-age">
						<select class="form-control select-age">
							<option hidden disabled selected value>-</option>
							<option value="0">만 0~5세</option>
							<option value="6">만 6~18세</option>
							<option value="19">만 19~64세</option>
							<option value="65">만 65세 이상</option>
						</select>
					</div>
					<div class="col-sm-2 form-inline">
						월 <input type="text" class="form-control input-income" style="width: 50%;" />0,000₩<br>
						<div class="div-hangul-income"></div>
					</div>
					<div class="col-sm-1">+</div>
					<div class="col-sm-2 div-pension">(없음)</div>
				</div>
			</div>

			<div class="form-actions right row">
				<div class="col-sm-offset-1 col-sm-3">
					<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
				</div>
			</div>
		</div>
	
	<br><br><br><br><br><br><br><br>
		
		<div class="form-horizontal" id="form-member-support">
			<div class="form-head row">
				<div class="col-sm-1">#</div>
				<div class="col-sm-3">복지급여 / 세금 감면 제도</div>
				<div class="col-sm-offset-1 col-sm-2">수혜받는 구성원</div>
				<div class="col-sm-2">연간 지원금액</div>
			</div>
			
			<div class="form-body">
				
				<div class="form-supportType form-group row" id="form-supportType-0">
					<div class="col-sm-1">1<br></div>
					<label class="col-sm-3">두루누리 사회보험 지원사업</label>
					
					<div class="col-sm-6 form-body-memebers">
						
						<div class="form-group" id="form-support-member-0_0"> <!-- CSS padding: 0 15px; -->
<!--
							<button type="button" class="col-sm-2 delete-field btn btn-default prev-step">삭제</button>
							<div class="col-sm-4 form-inline div-member">
								<select class="form-control select-member">
									<option hidden disabled selected value>-</option>
								</select>
							</div>
							<div class="col-sm-4 form-inline">
								연 <input type="text" class="form-control input-support" style="width: 50%;" />0,000₩<br>
								<div class="div-hangul-support"></div>
							</div>
-->
						</div>
						
						<div class="form-actions right row">
							<div class="col-sm-offset-2 col-sm-4">
								<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-supportType form-group row" id="form-supportType-1">
					<div class="col-sm-1">2</div>
					<label class="col-sm-3">근로장려금</label>
					
					<div class="col-sm-6 form-body-memebers">
					
						<div class="clearfix visible-xs-block"></div>
						<div class="form-body-memebers">
							<div class="form-actions right row">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-supportType form-group row" id="form-supportType-2">
					<div class="col-sm-1">3</div>
					<label class="col-sm-3">자녀장려금</label>
					
					<div class="col-sm-6 form-body-memebers">
					
						<div class="clearfix visible-xs-block"></div>
						<div class="form-body-memebers">
							<div class="form-actions right row">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-supportType form-group row" id="form-supportType-3">
					<div class="col-sm-1">4</div>
					<label class="col-sm-3">일자리안정자금</label>
					
					<div class="col-sm-6 form-body-memebers">
					
						<div class="clearfix visible-xs-block"></div>
						<div class="form-body-memebers">
							<div class="form-actions right row">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-supportType form-group row" id="form-supportType-4">
					<div class="col-sm-1">5</div>
					<label class="col-sm-3">국민취업지원제도</label>
					
					<div class="col-sm-6 form-body-memebers">
					
						<div class="clearfix visible-xs-block"></div>
						<div class="form-body-memebers">
							<div class="form-actions right row">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-supportType form-group row" id="form-supportType-5">
					<div class="col-sm-1">6</div>
					<label class="col-sm-3">청년내일채움공제제도</label>
					
					<div class="col-sm-6 form-body-memebers">
					
						<div class="clearfix visible-xs-block"></div>
						<div class="form-body-memebers">
							<div class="form-actions right row">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="form-supportType form-group row" id="form-supportType-6">
					<div class="col-sm-1">7</div>
					<label class="col-sm-3">유가보조금</label>
					
					<div class="col-sm-6 form-body-memebers">
					
						<div class="clearfix visible-xs-block"></div>
						<div class="form-body-memebers">
							<div class="form-actions right row">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="button" class="add-field btn btn-default prev-step">구성원 추가 +</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>

	<script>
		var doc_body = document.getElementsByTagName("BODY")[0];
		doc_body.setAttribute('data-useragent', navigator.userAgent);
	</script>
	<script type="text/javascript" src="js/UIControl.js"></script>
	<script type="text/javascript" src="js/dynamicForm.js"></script>

</body>

</html>