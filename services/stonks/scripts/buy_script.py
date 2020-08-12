import sys
try:
    with open("../../intercoin/wallets/"+sys.argv[1]+".walletdata", "r") as account:
        money = int(account.read())
        account.close()
    with open("../actives/exchange_cource.exdata", "r") as exchange_cource_file:
        current_price = int(exchange_cource_file.read())
        exchange_cource_file.close()
    amount = sys.argv[2]
    total_price = int(amount) * current_price
    new_money_on_account = money - total_price
    with open("../../intercoin/wallets/"+sys.argv[1]+".walletdata", "w") as account:
        account.write(str(new_money_on_account))
        account.close()
    with open("../actives/"+sys.argv[1]+".transaction", "w") as transaction:
        transaction.write(str(amount))
        transaction.close()
except:
    with open("debug.log", "w") as debugger:
        debugger.write("Sudden error with "+sys.argv[1]+" "+sys.argv[2])
        debugger.close()