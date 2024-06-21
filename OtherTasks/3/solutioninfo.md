# Celebrity Problem Explanation and Solution

## Problem: Find the Celebrity

You are given a group of `n` people. Each person is labeled from `0` to `n-1`. A celebrity is defined as a person who:

1. Knows no one else in the group.
2. Is known by everyone else in the group.

You are given a helper function `bool knows(a, b)` that returns `true` if person `a` knows person `b`, and `false` otherwise. Your task is to implement a function `int findCelebrity(int n)` which returns the index of the celebrity if one exists, or `-1` if there is no celebrity.

## Constraints:
- You must minimize the number of calls to `knows(a, b)`.

## Example:

Input: n = 4 (where the group consists of people labeled 0, 1, 2, 3)
Output: Index of the celebrity or null if there is no celebrity

## Approach:

1. Use a two-pointer technique to identify a candidate for the celebrity.
2. Verify the candidate by ensuring everyone knows the candidate and the candidate knows no one.

The algorithm works in O(n) time, making it efficient.

