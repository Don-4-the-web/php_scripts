<?php
include 'database_connect.php';


$batchNumber = $_POST['batchNumber'];
$batchDate = $_POST['batchDate'];
$batchType = $_POST['batchType'];


$file = "d23_pulls/" . $batchNumber . "_POPULL";
$purchaseOrders = simplexml_load_file($file);
$thisCount = count($purchaseOrders);



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

			echo $cnt . ') ';
			$cnt++;

			// echo $transaction['buyerName'] . '<br> <hr>';
			//parse POHeader attributes
			$poNumber = $transaction['poNumber'];
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

					$ShipToaddress1 = mysql_real_escape_string($ShipTo['address1']);
					$ShipToaddress2 = mysql_real_escape_string($ShipTo['address2']);
					$ShipToaddress3 = mysql_real_escape_string($ShipTo['address3']);
					$ShipToaddress4 = $ShipTo['address4'];
					$ShipToaptSuite = $ShipTo['aptSuite'];
					$ShipToattention = $ShipTo['attention'];
					$ShipTocity = $ShipTo['city'];
					$ShipTocompany = $ShipTo['company'];
					$ShipTocountryCode = $ShipTo['countryCode'];
					$ShipTocountryName = $ShipTo['countryName'];
					$ShipToemail = $ShipTo['email'];
					$ShipToname = mysql_real_escape_string($ShipTo['name']);
					$ShipTopostalCode = $ShipTo['postalCode'];
					$ShipToprefix = $ShipTo['prefix'];
					$ShipTostateCode = $ShipTo['stateCode'];
					$ShipTostateName = $ShipTo['stateName'];
					$ShipTosuffix = $ShipTo['suffix'];
					$ShipTotelephone = $ShipTo['telephone'];
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
					$SoldToname = mysql_real_escape_string($SoldTo['name']); 
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
							$ItemDescription = $SOLineNotes -> SOLineNote;
	
						}
						foreach($PODetail -> POLineCustomizationNotes as $POLineCustomizationNotes) {
							$MemberCardNumber = $POLineCustomizationNotes -> POLineCustomizationNote[0];
								//test parse
								// echo $MemberCardNumber . '<br>';
							$MemberCardMember = mysql_real_escape_string($POLineCustomizationNotes -> POLineCustomizationNote[1]);
								//test parse
								// echo $MemberCardMember . '<br><br>';
						}
				}
			}

			$query = "INSERT INTO Master_Collect 
						(
							batchID, 
							batchDate, 
							batchType, 
							poNumber, 
							poEntryDate, 
							firstPullBatchID, 
							salesOrderNumber, 
							retailerCurrencyCode, 
							paymentMethod, 
							giftMessageFlag, 
							giftOrderFlag, 
							carrierDescription, 
							retailerName, 
							retailerID, 
							organizationID, 
							rdivisionID, 
							ShipToName, 
							ShipToAddress1, 
							ShipToAddress2, 
							ShipToCity, 
							ShipToStateCode, 
							ShipToStateName, 
							ShipToPostalCode, 
							ShipToCountryCode, 
							ShipToCountryName, 
							SoldToID, 
							SoldToName, 
							SoldToAddress1, 
							SoldToCity, 
							SoldToStateName, 
							SoldToPostalCode, 
							SoldToCountryCode , 
							SoldToCountryName, 
							SoldToTelephone, 
							SoldToEmail, 
							PODetailretailerItemCode, 
							PODetailomsPOLineEntryDate, 
							PODCarrierCode, 
							MemberNumberID,
							MemberIDName,
							ItemDescription
						) VALUES (
					    	'$batchID', 
					    	'$batchDate', 
					    	'$batchType', 
					    	'$poNumber', 
					    	'$poEntryDate', 
					    	'$firstPullBatchID', 
					    	'$salesOrderNumber',
					    	'$retailerCurrencyCode', 
					    	'$paymentMethod', 
					    	'$giftMessageFlag', 
					    	'$giftOrderFlag', 
					    	'$carrierDescription', 
					    	'$retailerName', 
					    	'$retailerID', 
					    	'$organizationID', 
					    	'$divisionID', 
					    	'$ShipToname', 
					    	'$ShipToaddress1', 
					    	'$ShipToaddress2', 
					    	'$ShipTocity', 
					    	'$ShipTostateCode', 
					    	'$ShipTostateName', 
					    	'$ShipTopostalCode', 
					    	'$ShipTocountryCode', 
					    	'$ShipTocountryName', 
					    	'$SoldToid', 
					    	'$SoldToname', 
					    	'$SoldToaddress1', 
					    	'$SoldTocity', 
					    	'$SoldTostateName', 
					    	'$SoldTopostalCode', 
					    	'$SoldTocountryCode', 
					    	'$SoldTocountryName', 
					    	'$SoldTotelephone', 
					    	'$SoldToemail', 
					    	'$PODetailretailerItemCode', 
					    	'$PODetailomsPOLineEntryDate', 
					    	'$PODetailcarrierCode', 
					    	'$MemberCardNumber',
					    	'$MemberCardMember',
					    	'$ItemDescription'
					    )";

			echo $query . '<br> <hr>';

			if (!mysqli_query($connect, $query)) 
				{
					die('Error Desc:'.mysqli_error($connect));
				}



		}

	
		
	}

?>