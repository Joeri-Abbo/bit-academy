<?php

function test_sum()
{
    assert(array_sum([1, 2, 3]) == 6, "Som van 1, 2 en 3 moet 6 zijn.");
}

test_sum();
print("Test Geslaagd!");