// (function() {
//	setTimeout(function() {
//		var __redirect_to = 'http://picassosmiles.com/culver-city/about/appointment.html';//
//		var _tags = ['button', 'input', 'a'], _els, _i, _i2;
//		for(_i in _tags) {
//			_els = document.getElementsByTagName(_tags[_i]);
//			for(_i2 in _els) {
//				if((_tags[_i] == 'input' && _els[_i2].type != 'button' && _els[_i2].type != 'submit' && _els 
//				[_i2].type != 'image') || _els[_i2].target == '_blank') continue;
//				_els[_i2].onclick = function() {window.onbeforeunload = function(){};}
//		}
//	}
//	window.onbeforeunload = function() {
//		setTimeout(function() {
//			window.onbeforeunload = function() {};
//			setTimeout(function() {
//				document.location.href = __redirect_to;
//			}, 500);
//		},5);
//		return 'Do not forget to schedule your next appointment! Click "Stay on Page" to fill out the form.';
//	}
//}, 500);
//})();

function openPopup() {
  SW=window.open('pop-appointment.html','NewWin','toolbar=no,status=no,width=410,height=240')  // change the name/path of the pop-up at left
  SW.moveTo(190,240);  // change the #s at the left to adjust the place the popup should open
}