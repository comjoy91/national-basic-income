// 추가할 form-group의 양식
var template_member = '<div class="form-group row" id="form-member-1">\
					<button type="button" class="col-sm-1 delete-field btn btn-default prev-step">삭제</button>\
					<label class="col-sm-1 control-label">본인</label>\
					<div class="col-sm-2 form-inline div-age">\
						<select class="form-control select-age">\
							<option hidden disabled selected value>-</option>\
							<option value="0">만 0~5세</option>\
							<option value="6">만 6~18세</option>\
							<option value="19">만 19~64세</option>\
							<option value="65">만 65세 이상</option>\
						</select>\
					</div>\
					<div class="col-sm-2 form-inline">\
						월 <input type="text" class="form-control input-income" style="width: 50%;" />0,000₩<br>\
						<div class="div-hangul-income"></div>\
					</div>\
					<div class="col-sm-1">+</div>\
					<div class="col-sm-2 div-pension">(없음)</div>\
				</div>';

var template_babyPension = '<div class="div-babyPension">월 100,000₩</div>';

var template_noPension = '(없음)';

var template_elderBasicPension = '<select class="form-control select-elderBasicPension">\
									<option hidden disabled selected value>-</option>\
									<option value="0">월 0₩</option>\
									<option value="253700">월 253,700₩</option>\
									<option value="300000">월 300,000₩</option>\
								</select>';

var template_supportMember = '<div class="form-group" id="form-support-member-0_0">\
								<button type="button" class="col-sm-2 delete-field btn btn-default prev-step">삭제</button>\
								<div class="col-sm-4 form-inline div-member">\
									<select class="form-control select-member">\
	<!--									<option hidden disabled selected value>-</option>-->\
										<option value="0">본인</option>\
									</select>\
								</div>\
								<div class="col-sm-4 form-inline">\
									연 <input type="text" class="form-control input-support" style="width: 50%;" />0,000₩<br>\
									<div class="div-hangul-support"></div>\
								</div>\
							</div>'

var template_supportMember_option = '<option value="0">구성원 #0</option>'

//member id(구성원 #) int를 순서대로 저장하는 array. 0 = "본인".
var memberID = [0];

var memberNum = 1;
var memberMaxIndex = 0;


// --------------------------------------------------------------------
// ------------ for #form-member-income: 구성원 및 소득정보 입력 ------------
// --------------------------------------------------------------------

// dom의 index(id, label의 "구성원 #")를 바꿈.
function indexChange_memberDom(dom, index) {
	dom.attr("id", "form-member-"+index)
		.find("label.control-label").html("구성원 #"+index);
}
function indexChange_optionDom(dom, index) {
	dom.attr('value', index).html('구성원 #'+index);
}

// 구성원 1인 추가.
$('#form-member-income .add-field').click(function () {
	// update memberMaxIndex
	memberMaxIndex++;
	// #form-member-income .form-body에 추가 + index 설정.
	var temp_income = $(template_member).appendTo('#form-member-income .form-body');
//	var index = temp_income.index();
	indexChange_memberDom(temp_income, memberMaxIndex);
	// #form-member-support .form-body .div-member .select-member에 추가.
	var temp_support = $(template_supportMember_option).appendTo('#form-member-support .select-member');
	indexChange_optionDom(temp_support, memberMaxIndex);
	// update memberNum, memberID
	memberNum++;
	memberID.push(memberMaxIndex);
});

// 구성원 1인 삭제.
$('#form-member-income .form-body').on('click', '.delete-field', function () {
	// #form-member-income .form-body에서 삭제 + 나머지 member의 index 재설정
	var domToDel = $(this).parent();
	var index_domToDel = domToDel.index();
//	domToDel.nextAll().each(function (i, ele) {
//		indexChange_memberDom($(ele), index_domToDel+i);
//	});
	domToDel.remove();
	// #form-member-support .form-body .div-member select.select-member에서 제거.
	$('#form-member-support select.select-member').each(function(i, ele) {
		var domToDel = $(ele).find('option').eq(index_domToDel); // +1: "-" 항목 때문에 반드시 선택해야 함.
//		domToDel.nextAll().each(function (i, ele) {
//			indexChange_optionDom($(ele), index_domToDel+i);
//		});
		domToDel.remove();
	})
	// update memberNum and numberID
	memberNum--;
	memberID.splice(index_domToDel,1);
});

// 구성원이 만 0~5세일 때, 아동수당 항목 추가.
// 구성원이 만 65세 이상일 때, 노령기초연금 항목 추가.
$('#form-member-income .form-body').on('change', '.select-age', function() {
	var form_group = $(this).parent().parent();
	switch ($(this).val()) {
		case '0': 
			form_group.find('.div-pension').html(template_babyPension);
			break;
		case '6': 
			form_group.find('.div-pension').html(template_noPension);
			break;
		case '19':
			form_group.find('.div-pension').html(template_noPension);
			break;
		case '65':
			form_group.find('.div-pension').html(template_elderBasicPension);
			break;
		default: 
			break;
	}
})

// input-income이 변할 때, input-income(comma 찍기)과 div-hangul-income 텍스트 수정.
$('#form-member-income .form-body').on('input', '.input-income', function() {
	numberWithCommas($(this), $(this).val());
	
	if ($(this).val() !== "") {
		$(this).parent().find('.div-hangul-income').html(
			"월 " + 
			numberToKorean(
				numStrWithCommasToInt($(this).val()) * 10000
			) +
			" 원"
		);
	}
	else 
		$(this).parent().find('.div-hangul-income').html("");
});
// input-support가 변할 때, input-support(comma 찍기)와 div-hangul-support 텍스트 수정.
$('#form-member-support .form-body').on('input', '.input-support', function() {
	numberWithCommas($(this), $(this).val());
	
	if ($(this).val() !== "") {
		$(this).parent().find('.div-hangul-support').html(
			"월 " + 
			numberToKorean(
				numStrWithCommasToInt($(this).val()) * 10000
			) +
			" 원"
		);
	}
	else 
		$(this).parent().find('.div-hangul-support').html("");
});



// -------------------------------------------------------------------------------
// ------------ for #form-member-support: 구성원별 복지급여/세금감면 혜택 입력 ------------
// -------------------------------------------------------------------------------


// 각 지원항목에 대해 구성원 1인 추가.
$('#form-member-support .form-actions .add-field').click(function () {
	// #form-member-income .form-body에 추가 
	var domTarget = $(this).parent().parent();
	var temp_supportMember = $(template_supportMember).insertBefore(domTarget);
	var selectTag = temp_supportMember.find('select.select-member');
	for(var i=1; i<memberNum; i++) {
		var optionTag = $(template_supportMember_option).appendTo(selectTag);
		indexChange_optionDom(optionTag, memberID[i]);
	}
});

// 각 지원항목에 대해 구성원 1인 삭제.
$('#form-member-support .form-body').on('click', '.delete-field', function () {
	// #form-member-support .form-body에서 삭제.
	var domToDel = $(this).parent();
	domToDel.remove();
});
	