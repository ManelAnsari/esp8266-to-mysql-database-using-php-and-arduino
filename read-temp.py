#!/usr/bin/env python
import RPi.GPIO as GPIO # Import Raspberry Pi GPIO library
from time import sleep # Import the sleep function from the time module
GPIO.setwarnings(False) # Ignore warning for now
GPIO.setmode(GPIO.BOARD) # Use physical pin numbering
GPIO.setup(8, GPIO.OUT, initial=GPIO.LOW) # Set pin 8 to be an output pin and set initial value 
import urllib2,json
READ_API_KEY='5M62W3U52OZ9HUD8'
CHANNEL_ID=935390

def main():
    conn = urllib2.urlopen("http://api.thingspeak.com/channels/%s/feeds/last.json?api_key=%s" \
                           % (CHANNEL_ID,READ_API_KEY))

    response = conn.read()
    print "http status code=%s" % (conn.getcode())
    data=json.loads(response)
    print data['field1'],data['created_at']
    #print data['field1']
    if (float(data['field1'])>28):
     GPIO.output(8, GPIO.HIGH) # Turn on
    else: 
     GPIO.output(8, GPIO.LOW) # Turn off    
    conn.close()



if __name__ == '__main__':
    main()
