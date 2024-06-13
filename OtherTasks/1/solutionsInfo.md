
## Solution 1: Brute Force
### Idea: Iterate through all possible subarrays and check their sums.
#### Implementation:
Use a nested loop to define subarray boundaries.
Sum the elements of each subarray.
Count the subarrays whose sum equals KK.
#### Complexity: O(N^3)O(N 3) - very slow for large arrays.
## Solution 2: Improved Brute Force
### Idea: Use the prefix sum concept to reduce the time complexity.
#### Implementation:
Iterate through the array to calculate prefix sums.
Use only two loops instead of three and loops now has borders
Internal loop has a border of external one index - so we dont brut previos variants
#### Complexity: O(N^2)O(N 2) - faster than the first solution.
## Solution 3: Optimal Approach using Hash Map
### Idea: Use a single pass algorithm with a hash map to store the frequency of prefix sums.
#### Implementation:
Initialize a hash map to store the frequency of prefix sums and a variable for the running sum.
Traverse the array once, updating the running sum and checking the hash map for the required prefix sum to get the current subarray sum to KK.
Update the hash map with the current running sum.
#### Complexity: O(N)O(N) - optimal solution in terms of time.