
function showNav(idname)

{
	document.getElementById(idname).style.color  =  "#feb443";
};

function hideNav(idname)

{
	document.getElementById(idname).style.color  =  "#fff";
}

function handleOutboundLinkClicks(event) {
  ga('send', 'event', {
    eventCategory: 'Outbound Link',
    eventAction: 'click',
    eventLabel: event.target.href
  });
}