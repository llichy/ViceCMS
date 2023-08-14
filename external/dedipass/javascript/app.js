var app = angular.module('payment', ['pascalprecht.translate', 'slugifier']);

app.config(function ($translateProvider) {

  $translateProvider.translations('en', {
	HOW_DO_YOU_WANT_TO_PAY: 'How do you want to pay ?',
	LANG: 'English',

	'sms': 'SMS',
	'audiotel': 'Audiotel',
	'neosurf': 'Neosurf',
	'carte-bancaire': 'Credit card',
	'internet-plus-mobile': 'Internet+ Mobile',
	'paysafecard': 'Paysafecard',
	'cashu': 'CashU',
	'paypal': 'Paypal',

	'to_pay_by_sms': 'To pay by SMS, obtain an access code by texting',
	'to_pay_by_audiotel': 'To pay by phone, obtain an access code by calling the',
	'to_pay_by_neosurf': 'To pay by Neosurf, obtain an access code using your Neosurf prepaid card',
	'to_pay_by_carte-bancaire': 'To pay by credit card, obtain an access code',
	'to_pay_by_internet-plus-mobile': 'To pay by Internet+, obtain an access code',
	'to_pay_by_paysafecard': 'To pay by Paysafecard, obtain an access code using your Paysafecard prepaid card',
	'to_pay_by_cashu': 'To pay by Paysafecard, obtain an access code using your CashU prepaid card',
	'to_pay_by_paypal': 'To pay by Paypal, obtain an access code',

	FROM_WHICH_COUNTRY_WOULD_YOU_LIKE_TO_PAY: 'From which country would you like to pay?',

	FIND_A_RETAILER_HERE: 'find a retailer here',
	IF_YOU_DONT_HAVE_A_PAYSAFECARD_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Paysafecard prepaid card, you can',
	IF_YOU_DONT_HAVE_A_NEOSURF_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Neosurf prepaid card, you can',

	TO: 'to',

	USE_YOUR_ACCESS_CODE_VIRTUAL_CURRENCY: 'Once you have an access code, enter it below to receive your',
	USE_YOUR_ACCESS_CODE_CLASSIC: 'Once you have an access code, enter it below to confirm your payment',
	BUY_AN_ACCESS_CODE_BY: 'Buy an access code by ',

	FOR: 'for',
	ACCESS_CODE: 'Access code',
	OK: 'Ok',
	THANKS_FOR_YOUR_PURCHASE: 'Thanks for your purchase',
	OF: 'of',
	YOUR_ACCESS_CODE_IS_INCORRECT: 'Your access code is incorrect',
	I_HAVE_AN_ACCESS_CODE: 'I have an access code',
	REGION: 'Country',
	LANGUAGE: 'Language',
	HELP: 'Help'
  });

  $translateProvider.translations('fr', {
	HOW_DO_YOU_WANT_TO_PAY: 'Comment souhaitez-vous payer ?',
	LANG: 'Francais',

	'sms': 'SMS',
	'audiotel': 'Audiotel',
	'neosurf': 'Neosurf',
	'carte-bancaire': 'Carte bancaire',
	'internet-plus-mobile': 'Internet+ Mobile',
	'paysafecard': 'Paysafecard',
	'cashu': 'CashU',
	'paypal': 'Paypal',

	'to_pay_by_sms': 'Pour payer par SMS, obtenez un code d\'accès en envoyant par SMS',
	'to_pay_by_audiotel': 'Pour payer par téléphone, obtenez un code d\'accès en appellant le',
	'to_pay_by_neosurf': 'Pour payer par Neosurf, obtenez un code d\'accès en utilisant votre carte prépayée Neosurf',
	'to_pay_by_carte-bancaire': 'Pour payer par carte bancaire, obtenez un code d\'accès',
	'to_pay_by_internet-plus-mobile': 'Pour payer par Internet+ Mobile, obtenez un code d\'accès',
	'to_pay_by_paysafecard': 'Pour payer par Paysafecard, obtenez un code d\'accès en utilisant votre carte prépayée Paysafecard',
	'to_pay_by_cashu': 'Pour payer par CashU, obtenez un code d\'accès en utilisant votre carte prépayée CashU',
	'to_pay_by_paypal': 'Pour payer par Paypal, obtenez un code d\'accès',

	FROM_WHICH_COUNTRY_WOULD_YOU_LIKE_TO_PAY: 'Depuis quel pays souhaitez-vous payer?',

	FIND_A_RETAILER_HERE: 'trouver un revendeur ici',
	IF_YOU_DONT_HAVE_A_PAYSAFECARD_PREPAID_CARD_YOU_CAN: 'Si vous n\'avez pas de carte prépayée Paysafecard, vous pouvez',
	IF_YOU_DONT_HAVE_A_NEOSURF_PREPAID_CARD_YOU_CAN: 'Si vous n\'avez pas de carte prépayée Neosurf, vous pouvez',

	TO: 'au',

	USE_YOUR_ACCESS_CODE_VIRTUAL_CURRENCY: 'Lorsque vous avez obtenu un code d\'accès, saisissez le ci-dessous pour recevoir vos',
	USE_YOUR_ACCESS_CODE_CLASSIC: 'Lorsque vous avez obtenu un code d\'accès, saisissez le ci-dessous pour confirmer votre paiement',
	BUY_AN_ACCESS_CODE_BY: 'Acheter un code d\'accès par ',

	FOR: 'pour',
	ACCESS_CODE: 'Code d\'accès',
	OK: 'Ok',
	THANKS_FOR_YOUR_PURCHASE: 'Merci pour votre achat',
	OF: 'de',
	YOUR_ACCESS_CODE_IS_INCORRECT: 'Votre code d\'accès est incorrect',
	I_HAVE_AN_ACCESS_CODE: 'J\'ai un code d\'accès',
	REGION: 'Pays',
	LANGUAGE: 'Langue',
	HELP: 'Aide & Support'
  });

  $translateProvider.translations('de', {
	HOW_DO_YOU_WANT_TO_PAY: 'Wie möchten Sie zahlen ?',
	LANG: 'Deutsch',

	'sms': 'SMS',
	'audiotel': 'Audiotel',
	'neosurf': 'Neosurf',
	'carte-bancaire': 'Kreditkarte',
	'internet-plus-mobile': 'Internet+ Mobile',
	'paysafecard': 'Paysafecard',
	'cashu': 'CashU',
	'paypal': 'Paypal',

	'to_pay_by_sms': 'Um per SMS bezahlen, schicken SMS',
	'to_pay_by_audiotel': 'Um per Telefon bezahlen, rufen',
	'to_pay_by_neosurf': 'Um von Neosurf zahlen, erhalten einen Zugangscode mit Ihrer Prepaid-Karte Neosurf',
	'to_pay_by_carte-bancaire': 'Um mit Kreditkarte bezahlen, erhalten einen Zugangscode',
	'to_pay_by_internet-plus-mobile': 'Per pagare via Internet + Mobile, ottenere un codice di accesso',
	'to_pay_by_paysafecard': 'Um mit Paysafecard bezahlen, erhalten einen Zugangscode mit Ihrer Prepaid-Karte Paysafecard',
	'to_pay_by_cashu': 'Um von CashU zahlen, erhalten einen Zugangscode Ihre CashU Prepaid-Karte',
	'to_pay_by_paypal': 'Für die Zahlung per Paypal, erhalten einen Zugangscode',

	FROM_WHICH_COUNTRY_WOULD_YOU_LIKE_TO_PAY: 'From which country would you like to pay?',

	FIND_A_RETAILER_HERE: 'find a retailer here',
	IF_YOU_DONT_HAVE_A_PAYSAFECARD_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Paysafecard prepaid card, you can',
	IF_YOU_DONT_HAVE_A_NEOSURF_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Neosurf prepaid card, you can',

	TO: 'an',

	USE_YOUR_ACCESS_CODE_VIRTUAL_CURRENCY: 'Sobald Sie einen Zugangscode erhalten haben, geben Sie es unten erhalten Ihre',
	USE_YOUR_ACCESS_CODE_CLASSIC: 'Sobald Sie einen Zugangscode haben, geben Sie unten Ihre Zahlung zu bestätigen',
	BUY_AN_ACCESS_CODE_BY: 'Kaufen Sie einen Zugangscode von ',

	FOR: 'für',
	ACCESS_CODE: 'Zugangscode',
	OK: 'Ok',
	THANKS_FOR_YOUR_PURCHASE: 'Danke für ihren Einkauf',
	OF: 'von',
	YOUR_ACCESS_CODE_IS_INCORRECT: 'Ihr Zugangscode ist falsch',
	I_HAVE_AN_ACCESS_CODE: 'Ich habe einen Zugangscode',
	REGION: 'Land',
	LANGUAGE: 'Sprache',
	HELP: 'Hilfe'
  });

  $translateProvider.translations('es', {
	HOW_DO_YOU_WANT_TO_PAY: 'Cómo quieres jugar ?',
	LANG: 'Español',

	'sms': 'SMS',
	'audiotel': 'Audiotel',
	'neosurf': 'Neosurf',
	'carte-bancaire': 'Carte bancaire',
	'internet-plus-mobile': 'Internet+ Mobile',
	'paysafecard': 'Paysafecard',
	'cashu': 'CashU',
	'paypal': 'Paypal',

	'to_pay_by_sms': 'Para pagar con SMS, enviar SMS',
	'to_pay_by_audiotel': 'Para pagar por teléfono, llame',
	'to_pay_by_neosurf': 'Para pagar con Neosurf, obtener un código de acceso utilizando su tarjeta de prepago Neosurf',
	'to_pay_by_carte-bancaire': 'Para pagar con tarjeta de crédito, obtener un código de acceso',
	'to_pay_by_internet-plus-mobile': 'El pago por internet + móvil, obtener un código de acceso',
	'to_pay_by_paysafecard': 'Para pagar con Paysafecard, obtener un código de acceso utilizando su tarjeta de prepago Paysafecard',
	'to_pay_by_cashu': 'Para pagar con CashU, obtener un código de acceso utilizando su tarjeta de prepago CashU',
	'to_pay_by_paypal': 'Para pagar con Paypal, obtener un código de acceso',

	FROM_WHICH_COUNTRY_WOULD_YOU_LIKE_TO_PAY: 'From which country would you like to pay?',

	FIND_A_RETAILER_HERE: 'find a retailer here',
	IF_YOU_DONT_HAVE_A_PAYSAFECARD_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Paysafecard prepaid card, you can',
	IF_YOU_DONT_HAVE_A_NEOSURF_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Neosurf prepaid card, you can',

	TO: 'al',

	USE_YOUR_ACCESS_CODE_VIRTUAL_CURRENCY: 'Una vez que haya obtenido un código de acceso, introdúzcalo abajo para recibir su',
	USE_YOUR_ACCESS_CODE_CLASSIC: 'Una vez que tenga un código de acceso, introdúzcalo a continuación para confirmar su pago',
	BUY_AN_ACCESS_CODE_BY: 'Comprar un código de acceso de ',

	FOR: 'para',
	ACCESS_CODE: 'Código de acceso',
	OK: 'Ok',
	THANKS_FOR_YOUR_PURCHASE: 'Gracias por su compra',
	OF: 'de',
	YOUR_ACCESS_CODE_IS_INCORRECT: 'Su código de acceso es incorrecta',
	I_HAVE_AN_ACCESS_CODE: 'Tengo un código de acceso',
	REGION: 'País',
	LANGUAGE: 'Idioma',
	HELP: 'Ayudar'
  });

  $translateProvider.translations('it', {
	HOW_DO_YOU_WANT_TO_PAY: 'Come vuoi pagare ?',
	LANG: 'Italiano',

	'sms': 'SMS',
	'audiotel': 'Audiotel',
	'neosurf': 'Neosurf',
	'carte-bancaire': 'Carte bancaire',
	'internet-plus-mobile': 'Internet+ Mobile',
	'paysafecard': 'Paysafecard',
	'cashu': 'CashU',
	'paypal': 'Paypal',

	'to_pay_by_sms': 'Per pagare con SMS, inviare SMS',
	'to_pay_by_audiotel': 'Per pagare per telefono, chiamare',
	'to_pay_by_neosurf': 'Per pagare con Neosurf, ottenere un codice di accesso utilizzando la carta prepagata Neosurf',
	'to_pay_by_carte-bancaire': 'Per pagare con carta di credito, ottenere un codice di accesso',
	'to_pay_by_internet-plus-mobile': 'Per pagare via Internet+ Mobile, ottenere un codice di accesso',
	'to_pay_by_paysafecard': 'Per pagare con Paysafecard, ottenere un codice di accesso utilizzando la carta prepagata Paysafecard',
	'to_pay_by_cashu': 'Per pagare con CashU, ottenere un codice di accesso utilizzando la carta prepagata CashU',
	'to_pay_by_paypal': 'Per pagare con Paypal, ottenere un codice di accesso',

	FROM_WHICH_COUNTRY_WOULD_YOU_LIKE_TO_PAY: 'From which country would you like to pay?',

	FIND_A_RETAILER_HERE: 'find a retailer here',
	IF_YOU_DONT_HAVE_A_PAYSAFECARD_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Paysafecard prepaid card, you can',
	IF_YOU_DONT_HAVE_A_NEOSURF_PREPAID_CARD_YOU_CAN: 'If you don\'t have a Neosurf prepaid card, you can',

	TO: 'al',

	USE_YOUR_ACCESS_CODE_VIRTUAL_CURRENCY: 'Una volta ottenuto un codice di accesso, inseriscilo qui sotto per ricevere la vostra',
	USE_YOUR_ACCESS_CODE_CLASSIC: 'Una volta che hai un codice di accesso, inseriscilo qui sotto per confermare il pagamento',
	BUY_AN_ACCESS_CODE_BY: 'Acquistare un codice di accesso per ',

	FOR: 'per',
	ACCESS_CODE: 'Codice d\'accesso',
	OK: 'Ok',
	THANKS_FOR_YOUR_PURCHASE: 'Grazie per il tuo acquisto',
	OF: 'di',
	YOUR_ACCESS_CODE_IS_INCORRECT: 'Il codice di accesso è corretto',
	I_HAVE_AN_ACCESS_CODE: 'Ho un codice di accesso',
	REGION: 'Paese',
	LANGUAGE: 'Lingua',
	HELP: 'Aiuto'
  });

  //$translateProvider.preferredLanguage('fr');
  $translateProvider
  .registerAvailableLanguageKeys(['en','fr','de','es','it'], {
	'en_US': 'en',
	'en_UK': 'en',
	'en_us': 'en',
	'en_uk': 'en',
	'en-US': 'en',
	'en-UK': 'en',
	'en-us': 'en',
	'en-uk': 'en',
	'en': 'en',

	'fr_FR': 'fr',
	'fr_CA': 'fr',
	'fr_fr': 'fr',
	'fr_ca': 'fr',
	'fr_ch': 'fr',
	'fr_CH': 'fr',
	'fr-FR': 'fr',
	'fr-CA': 'fr',
	'fr-fr': 'fr',
	'fr-ca': 'fr',
	'fr-CH': 'fr',
	'fr-ch': 'fr',
	'fr': 'fr',

	'de': 'de',
	'de_at': 'de',
	'de_AT': 'de',
	'de_de': 'de',
	'de_DE': 'de',
	'de_li': 'de',
	'de_LI': 'de',
	'de_lu': 'de',
	'de_LU': 'de',
	'de_ch': 'de',
	'de-CH': 'de',
	'de-at': 'de',
	'de-AT': 'de',
	'de-de': 'de',
	'de-DE': 'de',
	'de-li': 'de',
	'de-LI': 'de',
	'de-lu': 'de',
	'de-LU': 'de',
	'de-ch': 'de',
	'de-CH': 'de',

	'it': 'it',
	'it-ch': 'it',
	'it-CH': 'it',
	'it_ch': 'it',
	'it_CH': 'it',
	'it-it': 'it',
	'it-IT': 'it',
	'it_it': 'it',
	'it_IT': 'it',

	'es': 'es',
	'es_es': 'es',
	'es_ES': 'es',
	'es-es': 'es',
	'es-ES': 'es'
  })
  .determinePreferredLanguage()
  .fallbackLanguage('fr');

  $translateProvider.useSanitizeValueStrategy(null);
});

app.directive('embedSrc', function () {
  return {
	restrict: 'A',
	link: function (scope, element, attrs) {
	  var current = element;
	  scope.$watch(attrs.embedSrc, function () {
		var clone = element
					  .clone()
					  .attr('data', attrs.embedSrc);
		current.replaceWith(clone);
		current = clone;
	  });
	}
  };
});

app.controller('Ctrl', function ($scope, $translate, $http, Slug, $filter, $sce, $timeout) {
  $scope.key = "90b1df9d708cf8ab5de6c9899f429eb0";
  $scope.keyCss = $scope.key;
  $scope.key = $scope.key.replace('/', '');
  $scope.custom = window.location.hash.replace('#', '').split('&')[0];
  $scope.countryPreSelected = window.location.hash.replace('#', '').split('&')[1];
  $scope.globalLoading = true;
  $scope.cssDemo = '';
  $scope.vcPriceOrder = '-user_price';

  $scope.changeLanguage = function (key) {
	$translate.use(key);
  };

  $scope.setCountry = function (iso, name) {
	$scope.countryIso = iso;
	$scope.countryName = name;
	$scope.solutionSlug = $scope.solutionsC[$scope.countryIso][0].slug;
	$('.step2').hide();
	$('.offer-more').hide();
	$('.step1').show();
	$('#howDoYouWantToPay').show();
  };

  $scope.setSolution = function (slug) {
	$scope.solutionSlug = slug;
  };

  $scope.backToStep1 = function () {
	$('.offer-more').hide();
	$('.step2').hide();
	$('.step1, #howDoYouWantToPay').show();
  };

  $scope.openModal = function (link) {
	window.open(link, 'Internet Plus', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=550,left = 420,top = 150');
  };

  $scope.selectRate = function (rate) {
	//$('.step1').hide();
	$('.step1, #howDoYouWantToPay').hide();
	$('.step2').show();
	$('.offer-more-' + rate).show();
  };

  $scope.loading = false;
  $scope.validate2 = function (rate) {
	$('.result').hide();
	$scope.loading = true;
	parent.postMessage('takeacapture_' + $('.code' + rate).val(), '*');
	if($scope.rates[0].validationType === 'callback')
	{
		// $http.get('https://api.dedipass.com/v1/pay/?key=' + $scope.key + '&rate=AUTORATE&code=' + $('.code-' + rate).val() + '&custom=' + $scope.custom).success(function(data) {
		$http.get('https://api.dedipass.com/v1/pay/?key=' + $scope.key + '&rate=AUTORATE&code=' + $('.code-' + rate).val() + '&custom=' + $scope.custom).success(function(data) {
			$scope.loading = false;
			if(data.status === 'success')
			{
				$('.code').val('');
				parent.postMessage(JSON.stringify(data), '*');
				// $('.result-true-' + rate).show();
				parent.shopShowAPI("success", data.virtual_currency+" Diamant"+((data.virtual_currency>1) ? "s" : ""));
			}
			else
			{
				parent.postMessage(JSON.stringify(data), '*');
				// $('.result-false-' + rate).show();
				parent.shopShowAPI("error", 0);
			}
		});
	}
	else
	{
		//$http.get('https://api.dedipass.com/v1/pay/?key=' + $scope.key + '&rate=AUTORATE&code=' + $('#code').val() + '&tokenize').success(function(data) {
		$http.get('https://api.dedipass.com/v1/pay/?key=' + $scope.key + '&rate=AUTORATE&code=' + $('.code-' + rate).val() + '&tokenize').success(function(data) {
			$scope.loading = false;
			parent.postMessage(JSON.stringify(data), '*');
			if(data.status === 'success')
			{
				$http.get('/api/shop.php?action=check&code=' + $('.code-' + rate).val() + '&user_price=' + $('.user_price-' + rate).val()).success(function(checkData) {
					if(checkData.status === 'success') {
						$scope.success = true;
						$scope.invalid = false;
						document.location.href="https://vicehabbo.fr/success.php";
					} else {
						$scope.success = false;
						$scope.invalid = true;
						document.location.href="https://vicehabbo.fr/codeerror.php";
					}
				});
				// $('#codeFormInput').val($('.code-' + rate).val());
				// $('#codeForm').attr('method', 'post').attr('action', $scope.rates[0].urlForm);
				// document.getElementById('codeForm').submit();
			}
			else
			{
				// $('.result-false-' + rate).show();
				$scope.success = false;
				$scope.invalid = true;
				document.location.href="https://vicehabbo.fr/codeerror.php";
			}
		});
	}
  };

  $scope.lang = 'fr';
  $scope.countryIso = 'all';
  $scope.countryName = 'Other';
  $scope.solutionSlug = '';

  $scope.changeLanguage = function (langKey) {
	$translate.use(langKey);
  };

  $scope.showRates = function(rate){
	return (rate.countryIsoC == 'all' && rate.solution_slug == $scope.solutionSlug) || 
		   (rate.countryIsoC == $scope.countryIso && rate.solution_slug == $scope.solutionSlug);
  };

  $scope.countries = [];
  $scope.countriesAll = [];
  $scope.solutions = [];
  $scope.solutionsAll = [];
  //$http.get('//buy.dedipass.com/v1/pay/rates?key=' + $scope.key).success(function(data) {
  $http.get('https://api.dedipass.com/v1/pay/rates?key=' + $scope.key).success(function(data) {
	$scope.rates = data;
	$scope.globalLoading = false;
	angular.forEach(data, function (data) {
	  if(data.virtual_currency_order === 'asc') {
		$scope.vcPriceOrder = 'user_price';
	  }
	  data.user_price = parseFloat(data.user_price);
	  data.solution_slug = $sce.trustAsHtml(Slug.slugify(data.solution));
	  data.mention_trusted = $sce.trustAsHtml(data.mention);
	  data.countryIsoC = data.country.iso;
	  $scope.countriesAll.push({
		'iso': data.country.iso,
		'name': data.country.name
	  });
	  $scope.solutionsAll.push({
		'order': parseFloat(data.ordered),
		'slug': Slug.slugify(data.solution),
		'name': data.solution
	  });
	});
	var flags = [];
	$scope.$watch('countriesAll', function() {
		var l = $scope.countriesAll.length, i;
		for( i=0; i<l; i++) {
			if( flags[$scope.countriesAll[i].iso]) continue;
			flags[$scope.countriesAll[i].iso] = true;
			$scope.countries.push({'iso': $scope.countriesAll[i].iso, 'name': $scope.countriesAll[i].name});
		}
	});
	var flags2 = [];
	var l2 = 0, i2;
	$scope.solutionsC = [];
	$scope.solutionsCAll = [];
	$scope.$watch('countries', function() {
		$http.get('https://geoip.dedipass.com').success(function(dataGeoIP) {
			if($scope.countryPreSelected && $scope.countryPreSelected.length === 2) {
				dataGeoIP.iso = $scope.countryPreSelected;
			}
			$timeout(function() { 
				if(typeof $scope.solutionsC[$scope.countryIso] === 'undefined') {
					$('#countryChoice').show();
					$('#howDoYouWantToPay').hide();
				}
			}, 500);
			angular.forEach($scope.countries, function (dataC) {
				if(dataC.iso == dataGeoIP.iso.toLowerCase()) { 
					$timeout(function() { $scope.setCountry(dataC.iso, dataC.name); }, 100);
				}
				$scope.solutionsCAll[dataC.iso] = [];
				angular.forEach($scope.rates, function (dataR) {
					if(dataR.country.iso === dataC.iso || dataR.country.iso === 'all') {
						$scope.solutionsCAll[dataC.iso].push({
							'order': parseFloat(dataR.ordered),
							'slug': Slug.slugify(dataR.solution),
							'name': dataR.solution
						});
					}
				});
				$scope.solutionsC[dataC.iso] = [];
				l2 = $scope.solutionsCAll[dataC.iso].length, i2;
				flags2 = [];
				for( i2=0; i2<l2; i2++) {
					if( flags2[$scope.solutionsCAll[dataC.iso][i2].slug]) continue;
					flags2[$scope.solutionsCAll[dataC.iso][i2].slug] = true;
					$scope.solutionsC[dataC.iso].push({
						'order': parseFloat($scope.solutionsCAll[dataC.iso][i2].order),
						'slug': Slug.slugify($scope.solutionsCAll[dataC.iso][i2].slug),
						'name': $scope.solutionsCAll[dataC.iso][i2].name
					});
				}
				$scope.solutionsC[dataC.iso].sort(function(a, b) {
					return a.order - b.order;
				});
			});
		});
		//$scope.solutionSlug = $scope.solutionsC[$scope.countryIso][0].slug;
	});   
	/*var flags2 = [];
	$scope.$watch('solutionsAll', function() {
		var l = $scope.solutionsAll.length, i;
		for( i=0; i<l; i++) {
			if( flags2[$scope.solutionsAll[i].slug]) continue;
			flags2[$scope.solutionsAll[i].slug] = true;
			$scope.solutions.push({'order': $scope.solutionsAll[i].order, 'slug': $scope.solutionsAll[i].slug, 'name': $scope.solutionsAll[i].name});
		}
		$filter('orderBy')($scope.solutions, 'order', false);
		$scope.solutionSlug = $scope.solutions[0].slug;
	});*/
	
	if(data[0].virtual_currency_name && data[0].virtual_currency_name.length > 0) {
		$scope.productType = 'virtualcurrency';
	}
	else {
		$scope.productType = 'classic';
	}

	function listener(event){
		$scope.keyCss = '';
		$scope.cssDemo = event.data;
		$scope.$apply();
	}

	if (window.addEventListener){
		addEventListener("message", listener, false);
	} else {
		attachEvent("onmessage", listener);
	}
  });
});