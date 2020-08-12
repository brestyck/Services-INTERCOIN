i=0
import time, random, ctypes
import numpy as np
from datetime import datetime
from matplotlib import pyplot as plt

ctypes.windll.user32.MessageBoxW(0, "Plotter successfully started!", "Server", 0)


fruits = []
counts = []
cource = random.randint(1000, 10000)
while True:
    t = datetime.now()
    i+=1
    if (i != 0):
        cource = random.randint(cource - 2000, cource + 2000)
    if (cource <= 1000): cource=1000
    if (cource >= 15000): cource=15000
    counts.append(cource)
    fruits.append(str(t.hour)+":"+str(t.minute))
    with open("exchange_cource.exdata", "w") as cource_file:
        cource_file.write(str(cource))
        cource_file.close()
    print(str(fruits))
    if (len(counts) >= 10):counts.pop(0);fruits.pop(0)

    plt.bar(fruits, counts)
    plt.scatter(x=fruits, y=counts, c="r")
    plt.title("Курс, IC")
    plt.xlabel("Время")
    plt.ylabel("Цена")
    fig, ax = plt.subplots()
    ax.plot(fruits, counts, 'o-r', alpha=0.7, label="first", lw=5, mec='b', mew=2, ms=10)
    ax.grid()
    fig.savefig('ex_plot.jpg')

    time.sleep(600)
