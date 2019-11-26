// int num에 comma 1000단위로 추가
function addComma(num) {
	var regexp = /\B(?=(\d{3})*(\d{2})(?!\d))/g; // /\B(?=(\d{3})+(?!\d))/g; -> 이게 오리지널.
	return num.toString().replace(regexp, ',');
}
// text input dom에서 comma가 없는 string str가 입력되었을 때, 이것을 comma 있는 string으로 인식하도록 함.
function numberWithCommas(dom, str) {
	str = str.replace(/[^0-9]/g,'');   // 입력값이 숫자가 아니면 공백
	str = str.replace(/,/g,'');          // ,값 공백처리
	if (str[0] === '0')					// 앞자리가 0일 때, 0 제거
		str = str.substring(1);
	$(dom).val(str.replace(/\B(?=(\d{3})*(\d{2})(?!\d))/g /*  /\B(?=(\d{3})+(?!\d))/g -> 이게 오리지널 */, ",")); // 정규식을 이용해서 3자리 마다 , 추가 
}
// comma가 붙은 string str을 int로 바꿔서 return.
function numStrWithCommasToInt(str) {
	str = str.replace(/,/g,'');
	return parseInt(str);
}
// int n에 comma를 붙인 string을 return.
function intToNumStrWithCommas(n) {
	return addComma(String(n));
}
// int number을 한글표기 숫자로 변환.
function numberToKorean(number){
    var inputNumber  = number < 0 ? false : number;
    var unitWords    = ["", "만", "억", "조", "경"];// ['', '만', '억', '조', '경'];
    var splitUnit    = 10000;
    var splitCount   = unitWords.length;
    var resultArray  = [];
    var resultString = '';

    for (var i = 0; i < splitCount; i++){
         var unitResult = (inputNumber % Math.pow(splitUnit, i + 1)) / Math.pow(splitUnit, i);
        unitResult = Math.floor(unitResult);
        if (unitResult > 0){
            resultArray[i] = unitResult;
        }
    }

    for (var i = 0; i < resultArray.length; i++){
        if(!resultArray[i]) continue;
        resultString = " " + String(resultArray[i]) + unitWords[i] + resultString;
    }

    return resultString;
}