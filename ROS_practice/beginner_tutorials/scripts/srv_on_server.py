#!/usr/bin/env python3
from beginner_tutorials.srv import *
import rospy
import time
def handle_srv_on(req):
    print ("Returning [%s + %s = %s]"%(req.a, req.b, (req.a + req.b)))
    time.sleep(0.5)
    return AddTwoIntsResponse(req.a + req.b)
"""
server on off
"""
def srv_on_server():
    rospy.init_node('ems_on_server')
    s = rospy.Service('srv_on', AddTwoInts, handle_srv_on)
    print ("Ready to add two ints.")
    rospy.spin()

if __name__ == "__main__":
    srv_on_server()