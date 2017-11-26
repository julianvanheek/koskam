//Retourneert de miliseconden van een Date-stamp

function Right(str, n) {
	if (n <= 0) return "";
	else if (n > String(str).length) return str;
	else {
		var iLen = String(str).length;
		return String(str).substring(iLen, iLen - n);
	}
}

//Retourneert getallen met een voorloop-0

function pad(number, length) {
	var str = '' + number;
	while (str.length < length) {
		str = '0' + str;
	}
	return str;
}

function getAfteltijd(debiteurnummer){
    var tempstring = '';
    $.ajax({
		type: "POST",
		url: "/checkRoute",
                data	: "debiteur=" + debiteurnummer,
                timeout: 3000,
                error: function() {
			tempstring = 'fout';
		},
		success: function(html) {
                    tempstring = html;
                    
                    dateFuture = new Date(tempstring);

                    dateNow = new Date();
                    starttijd = dateNow.getHours() + '' + dateNow.getMinutes();
                    
                    //if (starttijd >= '0730') {
                            GetCount(); //call when everything has loaded
                    //}

                    delete dateNow;
                    //return tempstring;
		}
	});
}

//Retourneert de eerstvolgende route gebaseerd op routetype (S1 of S2)
//IS KOMEN TE VERVALLEN per 18 mei 2017!!!
function getNewTargetDate(route) {

	var curdate = new Date();
	var hour = curdate.getHours();
	var nextroutehour = 0;
	var minutes = 0;
	var timeofday = '';
	var month = 0;
	var day = 0;
	var year = 0;
	var newTimeHour = 0;
	var newTimeMinute = 0;
	var currentTime = 0;
        var days = [0,31,28,31,30,31,30,31,31,30,31,30,31];
	//var feestdag = parseInt($("#feestdagen").html());

	if (route == "S1") {
		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 10) {
			if (hour > 7) {
				nextroutehour = 10;
			}
		}

		if (hour < 13) {
			if (hour > 9) {
				nextroutehour = 13;
			}
		}

		if (hour < 15) {
			if (hour > 12) {
				nextroutehour = 15;
			}
		}

		if (hour > 14) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			if (zaterdag == 'J') {
				var huidiguur = curdate.getHours();
				var huidigminuut = curdate.getMinutes();

				var testje = 100 * huidiguur;
				var testje2 = huidigminuut;
				var ZacurrentTime = testje + testje2;
				//String samenstellennewTime = 
				//var ZacurrentTime = newTimeHour + newTimeMinute;
				if (ZacurrentTime < 830) {
					nextroutehour = 8;
					minutes = 30;
				} else if (ZacurrentTime < 1030) {
					nextroutehour = 10;
					minutes = 30;
				} //else if(ZacurrentTime > 1030){
				// nextroutehour = 13;
				//}
				else {
					nextroutehour = 8;
					timeofday = " AM";
					day = day + 2;
				}
			} else {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
		}
                
                //Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
			timeofday = " PM";
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}

	if (route == "S1+") {
		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 10) {
			if (hour > 7) {
				nextroutehour = 10;
			}
		}

		if (hour < 11) {
			if (hour > 9) {
				nextroutehour = 11;
			}
		}

		if (hour < 13) {
			if (hour > 9) {
				nextroutehour = 13;
			}
		}

		if (hour < 15) {
			if (hour > 12) {
				nextroutehour = 15;
			}
		}

		if (hour > 14) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			if (zaterdag == 'J') {
				var huidiguur = curdate.getHours();
				var huidigminuut = curdate.getMinutes();

				var testje = 100 * huidiguur;
				var testje2 = huidigminuut;
				var ZacurrentTime = testje + testje2;
				//String samenstellennewTime = 
				//var ZacurrentTime = newTimeHour + newTimeMinute;
				if (ZacurrentTime < 830) {
					nextroutehour = 8;
					minutes = 30;
				} else if (ZacurrentTime < 1030) {
					nextroutehour = 10;
					minutes = 30;
				} //else if(ZacurrentTime > 1030){
				// nextroutehour = 13;
				//}
				else {
					nextroutehour = 8;
					timeofday = " AM";
					day = day + 2;
				}
			} else {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
			timeofday = " PM";
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}

	if (route == "S1++") {
		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 10) {
			if (hour > 7) {
				nextroutehour = 10;
			}
		}

		if (hour < 11) {
			if (hour > 9) {
				nextroutehour = 11;
			}
		}

		if (hour < 13) {
			if (hour > 9) {
				nextroutehour = 13;
			}
		}

		if (hour < 14) {
			if (hour > 12) {
				nextroutehour = 14;
			}
		}

		if (hour < 15) {
			if (hour > 13) {
				nextroutehour = 15;
			}
		}

		if (hour > 14) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			if (zaterdag == 'J') {
				var huidiguur = curdate.getHours();
				var huidigminuut = curdate.getMinutes();

				var testje = 100 * huidiguur;
				var testje2 = huidigminuut;
				var ZacurrentTime = testje + testje2;
				//String samenstellennewTime = 
				//var ZacurrentTime = newTimeHour + newTimeMinute;
				if (ZacurrentTime < 830) {
					nextroutehour = 8;
					minutes = 30;
				} else if (ZacurrentTime < 1030) {
					nextroutehour = 10;
					minutes = 30;
				} //else if(ZacurrentTime > 1030){
				// nextroutehour = 13;
				//}
				else {
					nextroutehour = 8;
					timeofday = " AM";
					day = day + 2;
				}
			} else {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
			timeofday = " PM";
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}

        if (route == "S1+++") {
		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 10) {
			if (hour > 7) {
				nextroutehour = 10;
			}
		}

		if (hour < 11) {
			if (hour > 9) {
				nextroutehour = 11;
			}
		}

		if (hour < 12) {
			if (hour > 9) {
				nextroutehour = 12;
			}
		}

		if (hour < 13) {
			if (hour > 12) {
				nextroutehour = 13;
			}
		}

		if (hour < 15) {
			if (hour > 13) {
				nextroutehour = 15;
			}
		}

		if (hour > 14) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			if (zaterdag == 'J') {
				var huidiguur = curdate.getHours();
				var huidigminuut = curdate.getMinutes();

				var testje = 100 * huidiguur;
				var testje2 = huidigminuut;
				var ZacurrentTime = testje + testje2;
				//String samenstellennewTime = 
				//var ZacurrentTime = newTimeHour + newTimeMinute;
				if (ZacurrentTime < 830) {
					nextroutehour = 8;
					minutes = 30;
				} else if (ZacurrentTime < 1030) {
					nextroutehour = 10;
					minutes = 30;
				} //else if(ZacurrentTime > 1030){
				// nextroutehour = 13;
				//}
				else {
					nextroutehour = 8;
					timeofday = " AM";
					day = day + 2;
				}
			} else {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
			timeofday = " PM";
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}
        
	if (route == "S2") {
		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 9) {
			if (hour > 7) {
				nextroutehour = 9;
			}
		}

		if (hour < 10) {
			if (hour > 8) {
				nextroutehour = 10;
			}
		}

		if (hour < 11) {
			if (hour > 9) {
				nextroutehour = 11;
			}
		}

		if (hour < 13) {
			if (hour > 10) {
				nextroutehour = 13;
			}
		}

		if (hour < 14) {
			if (hour > 12) {
				nextroutehour = 14;
			}
		}

		if (hour < 15) {
			if (hour > 13) {
				nextroutehour = 15;
			}
		}

		if (hour < 16) {
			if (hour > 14) {
				nextroutehour = 16;
			}
		}

		if (hour > 15) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}
	}
        
        if (route == "S2+") {
		if (hour >= 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 9) {
			if (hour > 7) {
				nextroutehour = 9;
			}
		}

		if (hour < 10) {
			if (hour > 8) {
				nextroutehour = 10;
			}
		}

		if (hour < 11) {
			if (hour > 9) {
				nextroutehour = 11;
			}
		}
                
                if (hour < 12) {
                    if(hour > 10) {
                        nextroutehour = 12;
                    }
                }

		if (hour < 13) {
			if (hour > 11) {
				nextroutehour = 13;
			}
		}

		if (hour < 14) {
			if (hour > 12) {
				nextroutehour = 14;
			}
		}

		if (hour < 15) {
			if (hour > 13) {
				nextroutehour = 15;
			}
		}

		if (hour < 16) {
			if (hour > 14) {
				nextroutehour = 16;
			}
		}

		if (hour > 15) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}
	}
        
        if (route == "S2++") {
		if (hour >= 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 9) {
			if (hour > 7) {
				nextroutehour = 9;
			}
		}

		if (hour < 10) {
			if (hour > 8) {
				nextroutehour = 10;
			}
		}

		if (hour < 11) {
			if (hour > 9) {
				nextroutehour = 11;
			}
		}
                
                if (hour < 12) {
                    if(hour > 10) {
                        nextroutehour = 12;
                        minutes = 30;
                    }
                }

		if (hour < 13) {
			if (hour > 11) {
				nextroutehour = 13;
			}
		}

		if (hour < 14) {
			if (hour > 12) {
				nextroutehour = 14;
			}
		}

		if (hour < 15) {
			if (hour > 13) {
				nextroutehour = 15;
			}
		}

		if (hour < 16) {
			if (hour > 14) {
				nextroutehour = 16;
			}
		}

		if (hour > 15) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}
	}

	if (route == "S5") {
		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		if (hour < 8) {
			nextroutehour = 8;
		}

		if (hour < 10) {
			if (hour > 7) {
				nextroutehour = 10;
			}
		}

		if (hour < 13) {
			if (hour > 9) {
				nextroutehour = 13;
			}
		}

		if (hour > 12) {
			nextroutehour = 8;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }

			//Is het vrijdag?
			if (curdate.getDay() == 5) {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			if (zaterdag == 'J') {
				var huidiguur = curdate.getHours();
				var huidigminuut = curdate.getMinutes();

				var testje = 100 * huidiguur;
				var testje2 = huidigminuut;
				var ZacurrentTime = testje + testje2;
				//String samenstellennewTime = 
				//var ZacurrentTime = newTimeHour + newTimeMinute;
				if (ZacurrentTime < 830) {
					nextroutehour = 8;
					minutes = 30;
				} else if (ZacurrentTime < 1030) {
					nextroutehour = 10;
					minutes = 30;
				} //else if(ZacurrentTime > 1030){
				// nextroutehour = 13;
				//}
				else {
					nextroutehour = 8;
					timeofday = " AM";
					day = day + 2;
				}
			} else {
				nextroutehour = 8;
				timeofday = " AM";
				day = day + 2;
			}
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
			timeofday = " PM";
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}

	//Velba S6
	if (route == "S6" || route == "S3") {
		minutes = 30;

		newTimeHour = hour.toString();
		//newTimeMinute = curMinutes.toString();
		newTimeMinute = curdate.getMinutes();

		while (newTimeMinute.length < 2) {
			newTimeMinute = "0" + newTimeMinute;
		}

		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		//String samenstellennewTime = 
		currentTime = newTimeHour + newTimeMinute;

		if (currentTime < 1530) {
			nextroutehour = 15;
		}

		if (currentTime < 1430) {
			nextroutehour = 14;
		}

		if (currentTime < 1330) {
			nextroutehour = 13;
		}

		if (currentTime < 1230) {
			nextroutehour = 12;
		}

		if (currentTime < 1130) {
			nextroutehour = 11;
		}

		if (currentTime < 1030) {
			nextroutehour = 10;
		}

		if (currentTime < 930) {
			nextroutehour = 9;
		}

		if (currentTime < 830) {
			nextroutehour = 8;
		}


		//Volgende dag?
		if (currentTime >= 1530) {
			nextroutehour = 8;
			minutes = 30;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		if (nextroutehour > 11) {
			timeofday = " PM";
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}
	}

	//Velba S7
	if (route == "S7") {
		minutes = 30;

		newTimeHour = hour.toString();
		//newTimeMinute = curMinutes.toString();
		newTimeMinute = curdate.getMinutes();

		while (newTimeMinute.length < 2) {
			newTimeMinute = "0" + newTimeMinute;
		}

		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		//String samenstellennewTime = 
		currentTime = newTimeHour + newTimeMinute;
		if (currentTime < 1530) {
			nextroutehour = 15;
		}

		if (currentTime < 1430) {
			nextroutehour = 14;
		}

		if (currentTime < 1300) {
			nextroutehour = 13;
			minutes = 0;
		}

		if (currentTime < 1130) {
			nextroutehour = 11;
			minutes = 30;
		}

		if (currentTime < 1000) {
			nextroutehour = 10;
			minutes = 0;
		}

		if (currentTime < 830) {
			nextroutehour = 8;
			minutes = 30;
		}

		//Volgende dag?
		if (currentTime >= 1530) {
			nextroutehour = 8;
			minutes = 30;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		if (nextroutehour > 11) {
			timeofday = " PM";
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}

	//Velba S8
	if (route == "S8") {
		minutes = 30;
		newTimeHour = hour.toString();
		//newTimeMinute = curMinutes.toString();
		newTimeMinute = curdate.getMinutes().toString();

		while (newTimeMinute.length < 2) {
			newTimeMinute = "0" + newTimeMinute;
		}

		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		//String samenstellennewTime = 
		currentTime = newTimeHour + newTimeMinute;
		if (currentTime < 1530) {
			nextroutehour = 15;
                        minutes = 30;
		}

		if (currentTime < 1400) {
			nextroutehour = 14;
                        minutes = 0;
		}

		if (currentTime < 1230) {
			nextroutehour = 12;
			minutes = 30;
		}

		if (currentTime < 1100) {
			nextroutehour = 11;
			minutes = 0;
		}

		if (currentTime < 930) {
			nextroutehour = 9;
			minutes = 30;
		}

		if (currentTime < 800) {
			nextroutehour = 8;
			minutes = 0;
		}
                                
		//Volgende dag?
		if (currentTime >= 1530) {
			nextroutehour = 8;
			minutes = 30;
			timeofday = " AM";
			                        
                        var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		if (nextroutehour > 11) {
			timeofday = " PM";
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}
        
        if (route == "S8+") {
		minutes = 30;
		newTimeHour = hour.toString();
		//newTimeMinute = curMinutes.toString();
		newTimeMinute = curdate.getMinutes().toString();

		while (newTimeMinute.length < 2) {
			newTimeMinute = "0" + newTimeMinute;
		}

		if (hour > 11) {
			timeofday = " PM";
		} else {
			timeofday = " AM";
		}

		month = curdate.getMonth() + 1;
		day = curdate.getDate();
		year = curdate.getFullYear();

		//String samenstellennewTime = 
		currentTime = newTimeHour + newTimeMinute;
                if (currentTime < 1600) {
                    nextroutehour = 16;
                    minutes = 0;
                }
                
		if (currentTime < 1530) {
			nextroutehour = 15;
                        minutes = 30;
		}

		if (currentTime < 1400) {
			nextroutehour = 14;
                        minutes = 0;
		}

		if (currentTime < 1230) {
			nextroutehour = 12;
			minutes = 30;
		}

		if (currentTime < 1100) {
			nextroutehour = 11;
			minutes = 0;
		}

		if (currentTime < 930) {
			nextroutehour = 9;
			minutes = 30;
		}

		if (currentTime < 800) {
			nextroutehour = 8;
			minutes = 0;
		}

		//Volgende dag?
		if (currentTime >= 1600) {
			nextroutehour = 8;
			minutes = 30;
			timeofday = " AM";
			var aantal_dagen = days[month];
                        
                        if(aantal_dagen > day){
                            day = day + 1;
                        }else{
                            //naar de volgende maand tillen
                            day = 1;
                            month = (month + 1) == 13 ? 1 : (month + 1);
                        }
                        
                        //is het de dag voor een feestdag?
                        var dagen_voor_feestdagen_array = "26 4";
                        var dagmaand = curdate.getDate() + " " + (curdate.getMonth()+1);
                        
                        if(dagmaand === dagen_voor_feestdagen_array){
                           day = day + 1;
                        }
		}

		if (nextroutehour > 11) {
			timeofday = " PM";
		}

		if (nextroutehour > 12) {
			nextroutehour = nextroutehour - 12;
		}

		//Is het zaterdag?
		if (curdate.getDay() == 6) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 2;
		}

		//Is het zondag?
		if (curdate.getDay() == 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + 1;
		}

		//Is het een feestdag?
		if (feestdag > 0) {
			nextroutehour = 8;
			timeofday = " AM";
			day = day + feestdag;
		}

	}


	if (nextroutehour > 12) {
		timeofday = '';
	}

	var tempstring = pad(month, 2) + "/" + day + "/" + year + " " + nextroutehour + ":" + pad(minutes, 2) + ":00 " + timeofday;
	var ajaxtempstring = day + "-" + pad(month, 2) + "-" + year + " " + nextroutehour + ":" + pad(minutes, 2) + ":00 " + timeofday;
/**
	setInterval(function() { 
		$.ajax({
			type: "POST",
			url: "modules/kosWebshop/ajax/ajax.showWinkelwagenAlert.php",
			data: "volgendetijd=" + ajaxtempstring,
			success: function(msg){
				$(msg).appendTo("#systeembericht");
			}
		});
	}, 30000);
**/

	return tempstring;
}

function checkFeestdag() {

	var feestdag = 0;

	$.ajax({
		type: "POST",
		url: "scripts/routeTeller/ajax/ajax.checkFeestdag.php",
		timeout: 3000,
		error: function() {
			//showMessageBox("Er is een fout opgetreden bij het opvragen van de tijd.");
		},
		success: function(html) {
			var feestdag = parseInt(html);
		}
	});
}



function GetCount() {
	dateNow = new Date();
	amount = dateFuture.getTime() - dateNow.getTime();
	delete dateNow;

	// time is already past
	if (amount < 0) {
		//dateFuture = new Date(getNewTargetDate(gp_route));
                //Onderstaande kan eigenlijk helemaal niet.... ZSM oplossen!!
                dateFuture = new Date(getAfteltijd(debiteurnummer));
                dateNow = new Date();
		amount = dateFuture.getTime() - dateNow.getTime();
	}

	var days = 0;
	var hours = 0;
	var secs = 0;

	amount = Math.floor(amount / 1000);
	days = pad(Math.floor(amount / 86400), 2); //days
	amount = amount % 86400;
	hours = pad(Math.floor(amount / 3600), 2); //hours
	amount = amount % 3600;
	mins = pad(Math.floor(amount / 60), 2); //minutes
	amount = amount % 60;
	secs = pad(Math.floor(amount), 2); //seconds

	//Tabel vullen
	document.getElementById('kk_clock_days').innerHTML = days + '&nbsp;:&nbsp;';
	document.getElementById('kk_clock_hours').innerHTML = hours + '&nbsp;:&nbsp;';
	document.getElementById('kk_clock_minutes').innerHTML = mins + '&nbsp;:&nbsp;';
	document.getElementById('kk_clock_seconds').innerHTML = secs;
	setTimeout("GetCount()", 1000);
}

getAfteltijd(debiteurnummer);
//var stringer = getNewTargetDate(gp_route);

//dateFuture = new Date(stringer);

//dateNow = new Date();
//starttijd = dateNow.getHours() + '' + dateNow.getMinutes();

//if (starttijd >= '0730') {
	//window.onload = GetCount; //call when everything has loaded
//}

//delete dateNow;