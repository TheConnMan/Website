low=0
high=1
for num in range(100):
    print low
    temp=high
    high+=low
    low=temp
