<?php
$file = "d23_pulls/68914_POPULL";
$purchaseOrders = simplexml_load_file($file);
$thisCount = count($purchaseOrders);
$batchDate = '2015-12-28';
$batchType = 'Replacements';
$MemberSince = 'Member Since';
$MemberSinceYear = '2015';
$ExpiresText = 'Expires';
$ExpireDate = '12/2016';
$GoldMemberText = '';
$Charter = '';
$Filler ='XXX';
$LetterType = 'Gold';
$ShippingWeight = '22.5';
$cntVar = ' ';

// echo $thisCount;

// exit();
$cnt = 1;

	// parse batch Number from POHeaders
	foreach ($purchaseOrders as $batchId) {
		// parse POHeaders attribute for batch #
		$batchID = $batchId['batchId'];
		// echo $batchID . '<br> <hr>';
		// print_r(json_encode($batchId));
		// print_r($batchId);


		//parse 2nd level object 'POHeader'
		foreach ($batchId -> POHeader as $transaction) {

			echo $cnt . '),';
			$cnt++;

			// echo $transaction['buyerName'] . '<br> <hr>';
			//parse POHeader attributes
			$poNumber = $transaction['poNumber'];
			echo $poNumber . ',';
			$poEntryDate = $transaction['poEntryDate'];
			$retailerCurrencyCode = $transaction['retailerCurrencyCode'];
			$retailerCurrencyRate = $transaction['currencyRate'];
			$vendorCurrencyCode = $transaction['vendorCurrencyCode'];
			$salesOrderNumber = $transaction['salesOrderNumber'];
			$buyerName = $transaction['buyerName'];
			$buyerCode = $transaction['buyerCode'];
			$freightCharges = $transaction['freightCharges'];
			$additionalFreightCharges = $transaction['additionalFreightCharges'];
			$additionalCharges = $transaction['additionalCharges'];
			$discountPercentages = $transaction['discountPercentage'];
			$discountAmount = $transaction['discountAmount'];
			$paymentMethod = $transaction['paymentMethod'];
			$giftMessageFlag = $transaction['giftMessageFlag'];
			$totalPOValueInRetailerCurr = $transaction['totalPOValueInRetailerCurr'];
			$totalPOValueInVendorCurr = $transaction['totalPOValueInVendorCurr'];
			$carrierDescription = $transaction['carrierDescription'];
			$paymentMethod = $transaction['paymentMethod'];
			$taxOnFreight = $transaction['taxOnFreight'];
			$firstPackslipFlag = $transaction['firstPackslipFlag'];
			$giftOrderFlag = $transaction['giftOrderFlag'];
			$paidAmount = $transaction['paidAmount'];
			$firstPullBatchID = $transaction['firstPullBatchID'];
			$currencyRate = $transaction['currencyRate'];
			$balanceDue = $transaction['balanceDue'];
			 // echo $poNumber . '<br>';
			// echo $poEntryDate . '<br>';
			 // echo $paymentMethod . '<br>';
			// echo $salesOrderNumber . '<br>' . '<br>' . '<br>';

				//parse Retailer attributes
				foreach ($transaction ->Retailer as $Retailer) {

					$divisionID  = $Retailer['divisionID'];
					$organizationID = $Retailer['organizationID'];
					$retailerDivisionAddress1 = $Retailer['retailerDivisionAddress1'];
					$retailerDivisionAddress2 = $Retailer['retailerDivisionAddress2'];
					$retailerDivisionAddress3 = $Retailer['retailerDivisionAddress3'];
					$retailerDivisionAddress4 = $Retailer['retailerDivisionAddress4'];
					$retailerDivisionCity = $Retailer['retailerDivisionCity'];
					$retailerDivisionCountryCode = $Retailer['retailerDivisionCountryCode'];
					$retailerDivisionCountryName = $Retailer['retailerDivisionCountryName'];
					$retailerDivisionPostalCode = $Retailer['retailerDivisionPostalCode'];
					$retailerDivisionStateCode = $Retailer['retailerDivisionStateCode'];
					$retailerDivisionStateName = $Retailer['retailerDivisionStateName'];
					$retailerID = $Retailer['retailerID'];
					$retailerName = $Retailer['retailerName'];
					$retailerReturnAddress1 = $Retailer['retailerReturnAddress1'];
					$retailerReturnAddress2 = $Retailer['retailerReturnAddress2'];
					$retailerReturnAddress3  = $Retailer['retailerReturnAddress3 '];
					$retailerReturnAddress4 = $Retailer['retailerReturnAddress4'];
					$retailerReturnCity = $Retailer['retailerReturnCity'];
					$retailerReturnCountryCode = $Retailer['retailerReturnCountryCode'];
					$retailerReturnCountryName  = $Retailer['retailerReturnCountryName '];
					$retailerReturnName = $Retailer['retailerReturnName'];
					$retailerReturnPostalCode = $Retailer['retailerReturnPostalCode'];
					$retailerReturnStateCode = $Retailer['retailerReturnStateCode'];
					$retailerReturnStateName = $Retailer['retailerReturnStateName'];
					//test parse
					//echo $retailerID. '<br>';
			
				}
				//parse Vendor attributes
				foreach ($transaction ->Vendor as $Vendor) {
					$vendoraddress1 = $Vendor['address1']; 
					$vendoraddress2 = $Vendor['address2']; 
					$vendoraddress3  = $Vendor['address3 ']; 
					$vendoraddress4 = $Vendor['address4']; 
					$vendorcity = $Vendor['city']; 
					$vendorcontact = $Vendor['contact']; 
					$vendorcountryCode = $Vendor['countryCode']; 
					$vendorcountryName = $Vendor['countryName']; 
					$vendoremail = $Vendor['email']; 
					$vendorfax = $Vendor['fax']; 
					$transactionType = $Vendor['name']; 
					$vendorpostalCode = $Vendor['postalCode']; 
					$vendorstateCode = $Vendor['stateCode']; 
					$vendorstateName  = $Vendor['stateName ']; 
					$vendortelephone = $Vendor['telephone']; 
					//test parse
						//echo $transactionType . '<br>';
				}
				//parse ShipTo attributes
				foreach ($transaction ->ShipTo as $ShipTo) {

					$ShipToaddress1 = $ShipTo['address1'];
					
					$ShipToaddress2 = $ShipTo['address2'];
					
					$ShipToaddress3 = $ShipTo['address3'];
					
					$ShipToaddress4 = $ShipTo['address4'];
					$ShipToaptSuite = $ShipTo['aptSuite'];
					$ShipToattention = $ShipTo['attention'];
					$ShipTocity = $ShipTo['city'];
					$ShipTocompany = $ShipTo['company'];
					$ShipTocountryCode = $ShipTo['countryCode'];
					$ShipTocountryName = $ShipTo['countryName'];
					
					$ShipToemail = $ShipTo['email'];
					$ShipToname = $ShipTo['name'];
					
					$ShipTopostalCode = $ShipTo['postalCode'];
					
					$ShipToprefix = $ShipTo['prefix'];
					$ShipTostateCode = $ShipTo['stateCode'];
					$ShipTostateName = $ShipTo['stateName'];
					
					$ShipTosuffix = $ShipTo['suffix'];
					$ShipTotelephone = $ShipTo['telephone'];
					echo $ShipToname . ',';
					echo $ShipToaddress1 . ',';
					echo $ShipToaddress2 . ',';
					echo $ShipToaddress3 . ',';
					echo $ShipTocity . ',';
					echo $ShipTostateName . ',';
					echo $ShipTopostalCode . ',';
					echo $ShipTocountryName . ',';
					//test parse
					// echo $ShipToname . '<br>';
					// echo $ShipToaddress1  . '<br>';
					// echo '<span style="color:red;">' . $ShipToaddress2 . '</span>';
					// echo '<span style="color:red;">' . $ShipToaddress3 . '</span>';
					// echo $ShipTocity . '<br>';
					// echo $ShipTostateName . '<br>';
					// echo $ShipTocountryCode . '<br>';
					// echo $ShipTopostalCode . '<br> <br> <br> <br>';
				}

				//parse SoldTo attributes
				foreach ($transaction -> SoldTo as $SoldTo) {
					$SoldToaddress1 = $SoldTo['address1']; 
					$SoldToaddress2 = $SoldTo['address2']; 
					$SoldToaddress3 = $SoldTo['address3']; 
					$SoldToaddress4 = $SoldTo['address4']; 
					$SoldToapt = $SoldTo['apt']; 
					$SoldToaptSuite = $SoldTo['aptSuite']; 
					$SoldTocity = $SoldTo['city']; 
					$SoldTocompany = $SoldTo['company']; 
					$SoldTocountryCode = $SoldTo['countryCode']; 
					$SoldTocountryName = $SoldTo['countryName']; 
					$SoldToemail = $SoldTo['email']; 
					$SoldToid = $SoldTo['id']; 
					$SoldToname = $SoldTo['name']; 
					$SoldTopostalCode = $SoldTo['postalCode']; 
					$SoldToprefix = $SoldTo['prefix']; 
					$SoldTostateCode = $SoldTo['stateCode']; 
					$SoldTostateName = $SoldTo['stateName']; 
					$SoldTosuffix = $SoldTo['suffix']; 
					$SoldTotelephone = $SoldTo['telephone']; 
					//test parse
					//	 echo $SoldToname . '<br>';
					//	 echo $SoldToaddress1  . '<br>';
					//	 echo $SoldTocity . '<br>';
					//	 echo $SoldTostateName . '<br>';
					//	 echo $SoldTocountryCode . '<br>';
					//	 echo $SoldTopostalCode . '<br> <br> <br> <br>';
				}

				//parse PODetails
				foreach ($transaction -> PODetails as $PODetails) {
					//parse PODetails Element => PODetail
					foreach ($PODetails -> PODetail as $PODetail) {
						$PODetailcancelAfterDate = $PODetail['cancelAfterDate'];
						$PODetailcarrierCode = $PODetail['carrierCode'];
						$PODetailcarrierDescription = $PODetail['carrierDescription'];
						$PODetailgiftWrapFlag = $PODetail['giftWrapFlag'];
						$PODetailitemCodeEAN = $PODetail['itemCodeEAN'];
						$PODetailitemCodeUPC = $PODetail['itemCodeUPC'];
						$PODetailitemDescriptionEAN = $PODetail['itemDescriptionEAN'];
						$PODetailitemDescriptionUPC = $PODetail['itemDescriptionUPC'];
						$PODetailitemDueDate = $PODetail['itemDueDate'];
						$PODetailomsPOLineEntryDate = $PODetail['omsPOLineEntryDate'];
						$PODetailpoLineCustomization = $PODetail['poLineCustomization'];
						$PODetailpoLineNumber = $PODetail['poLineNumber'];
						$PODetailpoRetailerExtendedTax = $PODetail['poRetailerExtendedTax'];
						$PODetailpoVendorExtendedTax = $PODetail['poVendorExtendedTax'];
						$PODetailretailerItemCode = $PODetail['retailerItemCode'];
						$PODetailretailerItemColor = $PODetail['retailerItemColor'];
						$PODetailretailerItemDescription = $PODetail['retailerItemDescription'];
						echo $PODetailretailerItemDescription . ',';
						$PODetailretailerItemSize = $PODetail['retailerItemSize'];
						$PODetailretailerItemSize2 = $PODetail['retailerItemSize2'];
						$PODetailretailerItemStyle = $PODetail['retailerItemStyle'];
						$PODetailretailerLineQuantity = $PODetail['retailerLineQuantity'];
						$PODetailretailerPOExtendedPrice = $PODetail['retailerPOExtendedPrice'];
						$PODetailretailerPOUnitPrice = $PODetail['retailerPOUnitPrice'];
						$PODetailretailerSalesOrderExtendedPrice = $PODetail['retailerSalesOrderExtendedPrice'];
						$PODetailretailerSalesOrderUnitPrice = $PODetail['retailerSalesOrderUnitPrice'];
						$PODetailretailerUOM = $PODetail['retailerUOM'];
						$PODetailretailerUnitRate = $PODetail['retailerUnitRate'];
						$PODetailsalesOrderExtendedFreight = $PODetail['salesOrderExtendedFreight'];
						$PODetailsalesOrderExtendedGST = $PODetail['salesOrderExtendedGST'];
						$PODetailsalesOrderExtendedHandling = $PODetail['salesOrderExtendedHandling'];
						$PODetailsalesOrderExtendedPST = $PODetail['salesOrderExtendedPST'];
						$PODetailsalesOrderExtendedTax = $PODetail['salesOrderExtendedTax'];
						$PODetailuomConversion = $PODetail['uomConversion'];
						$PODetailvendorItemCode = $PODetail['vendorItemCode'];
						$PODetailvendorItemDescription = $PODetail['vendorItemDescription'];
						$PODetailvendorLineQuantity = $PODetail['vendorLineQuantity'];
						$PODetailvendorPOExtendedPrice = $PODetail['vendorPOExtendedPrice'];
						$PODetailvendorPOUnitPrice = $PODetail['vendorPOUnitPrice'];
						$PODetailvendorUOM = $PODetail['vendorUOM'];
						$PODetailvendorUnitRate = $PODetail['vendorUnitRate'];
						//test parse
						// echo $PODetailomsPOLineEntryDate . '<br>';
						// echo $PODetailretailerItemCode  . '<br>';
						 //echo $PODetailretailerItemStyle . '<br>';
						// echo $PODetailretailerSalesOrderExtendedPrice . '<br>';
						// echo $PODetailsalesOrderExtendedTax . '<br>';
						// echo $PODetailretailerItemDescription . '<br> <br> <br> <br>';
	
						//parse PODetail Elements
						foreach($PODetail -> SOLineNotes as $SOLineNotes) {
							$RenewalType = $SOLineNotes -> SOLineNote;
	
						}
						foreach($PODetail -> POLineCustomizationNotes as $POLineCustomizationNotes) {
							$MemberCardNumber = $POLineCustomizationNotes -> POLineCustomizationNote[0];
							echo $MemberCardNumber . ',';
								//test parse
								// echo $MemberCardNumber . '<br>';
							$MemberCardMember = $POLineCustomizationNotes -> POLineCustomizationNote[1];
							echo $MemberCardMember . ',';
								//test parse
								// echo $MemberCardMember . '<br><br>';
						}
				}
			}

			
					    	echo '</br>';	
					   

			
		}

	
		
	}
?>