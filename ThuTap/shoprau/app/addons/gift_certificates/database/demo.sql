-- demo data --
REPLACE INTO ?:gift_certificates (`gift_cert_id`, `company_id`, `gift_cert_code`, `sender`, `recipient`, `send_via`, `amount`, `email`, `address`, `address_2`, `city`, `state`, `country`, `zipcode`, `status`, `timestamp`, `phone`, `order_ids`, `template`, `message`, `products`) VALUES (1,0,'GC-63SC-IL3N-6GP4','Demo Marketplace Team','Teresa Beesley','P',50.00,'','2210 Rockwell Lane','','Greenville','MA','US','27834','P',1486386249,'','','','<p>Dear Teresa,</p><p>You are our long-term customer, so we decided to encourage you with $50 bonus for further purchases.</p><p>Thank you for shopping in our marketplace!</p>','');
REPLACE INTO ?:gift_certificates (`gift_cert_id`, `company_id`, `gift_cert_code`, `sender`, `recipient`, `send_via`, `amount`, `email`, `address`, `address_2`, `city`, `state`, `country`, `zipcode`, `status`, `timestamp`, `phone`, `order_ids`, `template`, `message`, `products`) VALUES (2,0,'GC-Z12T-E0NW-0CS9','Kwik-E-Mart','Paul William','E',50.00,'WilliamEPaul@example.com','','','','','','','A',1486387309,'','','default.tpl','<p>Hi, Paul!</p><p>Here is your present from Kwik-E-Mart:</p><p>You can spend $50 on any products of ours.</p><p>Thank you!</p>','');