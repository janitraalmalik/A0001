
function tampilcity(prov_id)
 {
	 //var kdprop = document.getElementById("prov_id").value;

            var x;
            if(window.XMLHttpRequest)
            {
                    x= new XMLHttpRequest();
            }
            else
            {
                    x=new ActiveXObject("Microsoft.XMLHTTP");
            }
                    x.open("GET","index.php/member/pilih_city/"+prov_id,true);
                    

            x.onreadystatechange=function()
            {
                    document.getElementById("city").innerHTML=x.responseText;
            }
            x.send();
         //alert(kdprop);
 }

	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"birthday",
			dateFormat:"%Y-%m-%d"
		});
	};
 
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function generateCaptcha() {
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    }

    generateCaptcha();
    
    $('#contactForm')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The first name is required'
                        }
                    }
                },
                last_name: {
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The last name is required'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'The phone number is required'
                        },
                        regexp: {
                            message: 'The phone number can only contain the digits, spaces, -, (, ), + and .',
                            regexp: /^[0-9\s\-()+\.]+$/
                        }
                    }
                },
                company: {
                    validators: {
                        notEmpty: {
                            message: 'The Company is required'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        },
                        remote: {
							message: 'The email is already exist ',
							url: 'index.php/account/checkEmail',
							type: 'POST'
						}
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'The message is required'
                        }
                    }
                },
                province: {
                    validators: {
                        notEmpty: {
                            message: 'The Province is required'
                        }
                    }
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'The City is required'
                        }
                    }
                },
                identity: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        },
                        remote: {
							message: 'The username is already exist ',
							url: 'index.php/account/checkUsername',
							type: 'POST'
						}
                    }
                },
                password: {
			    validators: {
					notEmpty: {
					message: 'The password is required and cannot be empty'
					},
					different: {
					field: 'identity',
					message: 'The password cannot be the same as username'
						},
				    regexp:{
					 regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]{0,}).{8,}$",
					 message: 'The password should contain Minimum 8 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet and 1 Number:'
						}
				    
					}
				 },
		        confirmPassword: {
					validators: {
                        notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                        },
						identical: {
							field: 'password',
							message: 'The password and its confirm are not the same'
						},
						different: {
							field: 'identity',
							message: 'The password cannot be the same as username'
						}
					}
				},                 
                birthday: {
					validators: {
                        notEmpty: {
                            message: 'Birthday is required and cannto be empty'
                        },
						date: {
							format: 'YYYY-MM-DD',
							message: 'The birthday is not valid'
						}
					}
				},
                captcha: {
                    validators: {
                        callback: {
                            message: 'Wrong answer',
                            callback: function(value, validator, $field) {
                                var items = $('#captchaOperation').html().split(' '),
                                    sum   = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
                        }
                    }
                }
            }
        })
        .on('err.form.fv', function(e) {
            // Regenerate the captcha
            generateCaptcha();
        });
        
       
});



$(document).ready(function() {
 $('#loginForm')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                identity: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        }
                    }
                },
                password: {
			    validators: {
					notEmpty: {
					message: 'The password is required and cannot be empty'
					},
					different: {
					field: 'identity',
					message: 'The password cannot be the same as username'
						}
					}
				}               

            }
        })
 });
 
 $(document).ready(function() {
 $('#EditForm')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The first name is required'
                        }
                    }
                },
                last_name: {
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The last name is required'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'The phone number is required'
                        },
                        regexp: {
                            message: 'The phone number can only contain the digits, spaces, -, (, ), + and .',
                            regexp: /^[0-9\s\-()+\.]+$/
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'The message is required'
                        }
                    }
                },
                province: {
                    validators: {
                        notEmpty: {
                            message: 'The Province is required'
                        }
                    }
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'The City is required'
                        }
                    }
                },
                identity: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        },
                        remote: {
							message: 'The username is already exist ',
							url: 'index.php/account/checkUsername',
							type: 'POST'
						}
                    }
                },
                password: {
			    validators: {
					notEmpty: {
					message: 'The password is required and cannot be empty'
					},
					different: {
					field: 'identity',
					message: 'The password cannot be the same as username'
						},
				    regexp:{
					 regexp: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]{0,}).{8,}$",
					 message: 'The password should contain Minimum 8 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet and 1 Number:'
						}
				    
					}
				 },
		        confirmPassword: {
					validators: {
                        notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                        },
						identical: {
							field: 'password',
							message: 'The password and its confirm are not the same'
						},
						different: {
							field: 'identity',
							message: 'The password cannot be the same as username'
						}
					}
				},                 
                birthday: {
					validators: {
                        notEmpty: {
                            message: 'Birthday is required and cannto be empty'
                        },
						date: {
							format: 'YYYY-MM-DD',
							message: 'The birthday is not valid'
						}
					}
				}             

            }
        })
 });
