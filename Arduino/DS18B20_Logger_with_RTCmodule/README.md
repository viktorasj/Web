First: Read your DS18B20 addresses and fill them as filled in my file. USE DS18B20 SENSORS ONLY!!!

Note: Arduino can hold up to 8 sensors @ one pin, as they're digital.

Second: Check RTC module, SD Card Reader CS pins in file. I commented where is which.

Third: format your SD card to FAT32 with official SDCARDFORMATER and create log.csv manualy, as I tested auto creating file sometimes worked, sometimes didn't.

Fourth: You can change occuracy of your sensors editing "sensors.setResolution(Sensor1, 12)" line, the digit after "Sensor1". 12 is most sensitive, can read two digits after comma.
