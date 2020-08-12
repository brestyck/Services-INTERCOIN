import sys
wallet_id = sys.argv[1]
amount = sys.argv[2]
with open("../actives/exchange_cource.exdata", "r") as exchange_cource_file:
    excource = int(exchange_cource_file.read())
    exchange_cource_file.close()
totalmoney = excource * int(amount)
with open("../../intercoin/wallets/"+wallet_id+".walletdata", "r") as account:    
    balance = account.read()
    new_balance = int(balance) + totalmoney
    account.close()
with open("../../intercoin/wallets/"+wallet_id+".walletdata", "w") as account:
    account.write(str(new_balance))
    account.close()
with open("../actives/"+wallet_id+".transaction", "r") as transaction:
    old_amount = int(transaction.read())
    transaction.close()
with open("../actives/"+wallet_id+".transaction", "w") as transaction:
    transaction.write(str(old_amount - int(amount)))
    transaction.close()