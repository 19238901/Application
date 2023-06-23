#!/usr/bin/env python3
from beginner_tutorials.srv import *
import rospy
import time
def handle_ems_on(req):
    time.sleep(1)
    print ("Returning [%s + %s = %s]"%(req.a, req.b, (req.a + req.b)))
    return AddTwoIntsResponse(req.a + req.b)
"""
EMS on off
"""
def ems_on_server():
    rospy.init_node('ems_on_server')
    s = rospy.Service('ems_on', AddTwoInts, handle_ems_on)
    print ("Ready to add two ints.")
    rospy.spin()

if __name__ == "__main__":
    ems_on_server()