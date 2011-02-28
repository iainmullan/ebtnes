function ebtnes()
{
	var d=document,z=d.createElement('scr'+'ipt'),l=d.location;

	// 'in progress' message
	d.title='(Shortening...) '+d.title;

	//call the script from the ebtnes server
	z.setAttribute('src',l.protocol+'//ebtn.es/items/bm.json?u='+encodeURIComponent(l.href)+'&t='+(new Date().getTime()));
	b.appendChild(z);
	
}
	
ebtnes();
void(0)
